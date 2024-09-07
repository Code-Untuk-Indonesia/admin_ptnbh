<!-- Modal for Sejarah -->
<div class="modal fade" id="sejarahModal" tabindex="-1" role="dialog" aria-labelledby="sejarahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sejarahModalLabel">Sejarah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $data->isi_sejarah_id !!}
            </div>
        </div>
    </div>
</div>

<!-- Modal for Visi -->
<div class="modal fade" id="visiModal" tabindex="-1" role="dialog" aria-labelledby="visiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visiModalLabel">Visi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $data->visi_id !!}
            </div>
        </div>
    </div>
</div>

<!-- Modal for Misi -->
<div class="modal fade" id="misiModal" tabindex="-1" role="dialog" aria-labelledby="misiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="misiModalLabel">Misi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $data->misi_id !!}
            </div>
        </div>
    </div>
</div>

<!-- Modal for Tujuan -->
<div class="modal fade" id="tujuanModal" tabindex="-1" role="dialog" aria-labelledby="tujuanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tujuanModalLabel">Tujuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $data->tujuan_id !!}
            </div>
        </div>
    </div>
</div>

<!-- Repeat for English Sections -->

<!-- Modal for History (EN) -->
<div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="historyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="historyModalLabel">History (EN)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $data->isi_sejarah_en !!}
            </div>
        </div>
    </div>
</div>

<!-- Modal for Vision (EN) -->
<div class="modal fade" id="visionModal" tabindex="-1" role="dialog" aria-labelledby="visionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visionModalLabel">Vision (EN)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $data->visi_en !!}
            </div>
        </div>
    </div>
</div>

<!-- Modal for Mission (EN) -->
<div class="modal fade" id="missionModal" tabindex="-1" role="dialog" aria-labelledby="missionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="missionModalLabel">Mission (EN)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $data->misi_en !!}
            </div>
        </div>
    </div>
</div>

<!-- Modal for Goals (EN) -->
<div class="modal fade" id="goalsModal" tabindex="-1" role="dialog" aria-labelledby="goalsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="goalsModalLabel">Goals (EN)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $data->tujuan_en !!}
            </div>
        </div>
    </div>
</div>
