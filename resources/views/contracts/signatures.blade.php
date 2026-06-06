@extends('layouts.dashboard')

@section('title-page')
    <div class="page-header">
        <h4>Signature Positions — {{ $contract->contract_number }}</h4>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.contracts.signatures.update', $contract) }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-8">
                            <div id="pdf-container" style="position:relative; border:1px solid #ddd;">
                                <canvas id="pdf-canvas" style="width:100%; display:block;"></canvas>
                                <canvas id="overlay-canvas"
                                    style="position:absolute; left:0; top:0; pointer-events:auto;"></canvas>
                            </div>
                            <small class="text-muted">Click on the preview to place a signature marker. Coordinates stored
                                in pixels relative to rendered preview.</small>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h6>Signer List</h6>
                                    <div id="signatures-list">
                                        @php $i = 0; @endphp
                                        @forelse($signatures as $sig)
                                            @php
                                                $w = $sig['width'] ?? 260;
                                                $h = $sig['height'] ?? 90;
                                            @endphp
                                            <div class="row mb-2 signature-row">
                                                <div class="col-md-12 mb-1">
                                                    <div class="input-group">
                                                        <input name="signatures[{{ $i }}][name]"
                                                            value="{{ $sig['name'] }}" class="form-control"
                                                            placeholder="Signer name" required />
                                                        <input name="signatures[{{ $i }}][x]"
                                                            value="{{ $sig['x'] }}" class="form-control"
                                                            placeholder="X (px)" style="width:110px; margin-left:6px;"
                                                            required />
                                                        <input name="signatures[{{ $i }}][y]"
                                                            value="{{ $sig['y'] }}" class="form-control"
                                                            placeholder="Y (px)" style="width:110px; margin-left:6px;"
                                                            required />
                                                        <input name="signatures[{{ $i }}][width]"
                                                            value="{{ $w }}" class="form-control" placeholder="W"
                                                            style="width:90px; margin-left:6px;" required />
                                                        <input name="signatures[{{ $i }}][height]"
                                                            value="{{ $h }}" class="form-control"
                                                            placeholder="H" style="width:90px; margin-left:6px;" required />
                                                        <button type="button" class="btn btn-danger btn-sm remove-row"
                                                            style="margin-left:6px;">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $i++; @endphp
                                        @empty
                                            <div class="row mb-2 signature-row">
                                                <div class="col-md-12 mb-1">
                                                    <div class="input-group">
                                                        <input name="signatures[0][name]" class="form-control"
                                                            placeholder="Signer name" required />
                                                        <input name="signatures[0][x]" class="form-control"
                                                            placeholder="X (px)" style="width:110px; margin-left:6px;"
                                                            required />
                                                        <input name="signatures[0][y]" class="form-control"
                                                            placeholder="Y (px)" style="width:110px; margin-left:6px;"
                                                            required />
                                                        <input name="signatures[0][width]" value="260"
                                                            class="form-control" placeholder="W"
                                                            style="width:90px; margin-left:6px;" required />
                                                        <input name="signatures[0][height]" value="90"
                                                            class="form-control" placeholder="H"
                                                            style="width:90px; margin-left:6px;" required />
                                                        <button type="button" class="btn btn-danger btn-sm remove-row"
                                                            style="margin-left:6px;">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="button" id="add-signature" class="btn btn-secondary">Add Signer</button>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('admin.contracts.show', $contract) }}" class="btn btn-secondary me-2">Cancel</a>
                        <button class="btn btn-primary">Save Positions</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .signature-row {
                align-items: center;
            }

            #pdf-container {
                height: 600px;
                overflow: auto;
            }

            #pdf-container canvas {
                max-width: 100%;
            }

            .marker-label {
                position: absolute;
                background: rgba(0, 123, 255, 0.85);
                color: #fff;
                padding: 2px 6px;
                border-radius: 12px;
                font-size: 12px;
                transform: translate(-50%, -150%);
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.8.162/pdf.min.js"></script>
        <script>
            (function() {
                const previewUrl = '{{ route('admin.contracts.preview', $contract) }}';
                const pdfCanvas = document.getElementById('pdf-canvas');
                const overlay = document.getElementById('overlay-canvas');
                const container = document.getElementById('pdf-container');
                const ctx = pdfCanvas.getContext('2d');
                const octx = overlay.getContext('2d');

                let pdfDoc = null;
                let scale = 1;

                pdfjsLib.GlobalWorkerOptions.workerSrc =
                    'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.8.162/pdf.worker.min.js';

                pdfjsLib.getDocument(previewUrl).promise.then(function(pdf) {
                    pdfDoc = pdf;
                    return pdf.getPage(1);
                }).then(function(page) {
                    const viewport = page.getViewport({
                        scale: 1
                    });
                    // fit to container width
                    const containerWidth = container.clientWidth;
                    scale = containerWidth / viewport.width;
                    const renderViewport = page.getViewport({
                        scale: scale
                    });

                    pdfCanvas.width = Math.floor(renderViewport.width);
                    pdfCanvas.height = Math.floor(renderViewport.height);
                    overlay.width = pdfCanvas.width;
                    overlay.height = pdfCanvas.height;
                    overlay.style.width = pdfCanvas.style.width = '100%';
                    overlay.style.height = pdfCanvas.style.height = pdfCanvas.height + 'px';

                    const renderContext = {
                        canvasContext: ctx,
                        viewport: renderViewport
                    };
                    page.render(renderContext).promise.then(function() {
                        renderMarkers();
                    });
                }).catch(function(err) {
                    console.error(err);
                });

                function reindex() {
                    document.querySelectorAll('#signatures-list .signature-row').forEach(function(row, idx) {
                        row.querySelectorAll('input, select').forEach(function(input) {
                            var name = input.getAttribute('name');
                            if (!name) return;
                            var newName = name.replace(/signatures\[\d+\]/, 'signatures[' + idx + ']');
                            input.setAttribute('name', newName);
                        });
                    });
                }

                function drawMarker(x, y, w, h, label) {
                    // draw centered rectangle with translucent fill and border
                    const left = x - (w / 2);
                    const top = y - (h / 2);
                    octx.fillStyle = 'rgba(0,123,255,0.12)';
                    octx.fillRect(left, top, w, h);
                    octx.strokeStyle = 'rgba(0,123,255,0.9)';
                    octx.lineWidth = 2;
                    octx.strokeRect(left, top, w, h);
                    // label
                    octx.fillStyle = 'rgba(0,123,255,0.95)';
                    octx.font = '12px sans-serif';
                    octx.textAlign = 'center';
                    octx.fillText(label, x, top - 6);
                }

                function clearOverlay() {
                    octx.clearRect(0, 0, overlay.width, overlay.height);
                }

                function renderMarkers() {
                    clearOverlay();
                    const rows = document.querySelectorAll('#signatures-list .signature-row');
                    rows.forEach(function(row, idx) {
                        const xInput = row.querySelector('input[name$="[x]"]');
                        const yInput = row.querySelector('input[name$="[y]"]');
                        const nameInput = row.querySelector('input[name$="[name]"]');
                        if (!xInput || !yInput) return;
                        const x = parseFloat(xInput.value) || 0;
                        const y = parseFloat(yInput.value) || 0;
                        const wInput = row.querySelector('input[name$="[width]"]');
                        const hInput = row.querySelector('input[name$="[height]"]');
                        const w = wInput ? (parseFloat(wInput.value) || 260) : 260;
                        const h = hInput ? (parseFloat(hInput.value) || 90) : 90;
                        drawMarker(x, y, w, h, idx + 1);
                    });
                }

                // click on overlay to add marker
                overlay.addEventListener('click', function(e) {
                    const rect = overlay.getBoundingClientRect();
                    const x = Math.round((e.clientX - rect.left));
                    const y = Math.round((e.clientY - rect.top));
                    const name = prompt('Signer name');
                    if (!name) return;

                    const containerList = document.getElementById('signatures-list');
                    const count = containerList.querySelectorAll('.signature-row').length;
                    const div = document.createElement('div');
                    div.className = 'row mb-2 signature-row';
                    // default box size for e-sign area
                    const defW = 260;
                    const defH = 90;
                    div.innerHTML = `
                        <div class="col-md-12 mb-1">
                            <div class="input-group">
                                <input name="signatures[${count}][name]" value="${name}" class="form-control" placeholder="Signer name" required />
                                <input name="signatures[${count}][x]" value="${x}" class="form-control" placeholder="X (px)" style="width:110px; margin-left:6px;" required />
                                <input name="signatures[${count}][y]" value="${y}" class="form-control" placeholder="Y (px)" style="width:110px; margin-left:6px;" required />
                                <input name="signatures[${count}][width]" value="${defW}" class="form-control" placeholder="W" style="width:90px; margin-left:6px;" required />
                                <input name="signatures[${count}][height]" value="${defH}" class="form-control" placeholder="H" style="width:90px; margin-left:6px;" required />
                                <button type="button" class="btn btn-danger btn-sm remove-row" style="margin-left:6px;">Remove</button>
                            </div>
                        </div>
                    `;
                    containerList.appendChild(div);
                    reindex();
                    renderMarkers();
                });

                document.getElementById('add-signature').addEventListener('click', function() {
                    var container = document.getElementById('signatures-list');
                    var count = container.querySelectorAll('.signature-row').length;
                    var defW = 260;
                    var defH = 90;
                    var div = document.createElement('div');
                    div.className = 'row mb-2 signature-row';
                    div.innerHTML = `
                        <div class="col-md-12 mb-1">
                            <div class="input-group">
                                <input name="signatures[${count}][name]" class="form-control" placeholder="Signer name" required />
                                <input name="signatures[${count}][x]" class="form-control" placeholder="X (px)" style="width:110px; margin-left:6px;" />
                                <input name="signatures[${count}][y]" class="form-control" placeholder="Y (px)" style="width:110px; margin-left:6px;" />
                                <input name="signatures[${count}][width]" value="${defW}" class="form-control" placeholder="W" style="width:90px; margin-left:6px;" />
                                <input name="signatures[${count}][height]" value="${defH}" class="form-control" placeholder="H" style="width:90px; margin-left:6px;" />
                                <button type="button" class="btn btn-danger btn-sm remove-row" style="margin-left:6px;">Remove</button>
                            </div>
                        </div>
                    `;
                    container.appendChild(div);
                    reindex();
                    renderMarkers();
                });

                document.addEventListener('click', function(e) {
                    if (e.target && e.target.classList.contains('remove-row')) {
                        var row = e.target.closest('.signature-row');
                        row.remove();
                        reindex();
                        renderMarkers();
                    }
                });

                // live update markers when inputs change
                document.addEventListener('input', function(e) {
                    if (e.target && (e.target.matches('input[name$="[x]"]') || e.target.matches(
                                'input[name$="[y]"]') || e.target.matches('input[name$="[width]"]') || e.target
                            .matches('input[name$="[height]"]'))) {
                        renderMarkers();
                    }
                });

                // initial render markers after load
                window.addEventListener('load', function() {
                    setTimeout(renderMarkers, 500);
                });
            })();
        </script>
    @endpush
@endsection
