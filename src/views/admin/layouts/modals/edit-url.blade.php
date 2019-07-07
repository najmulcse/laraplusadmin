<!--edit modal-->
<div id="modalEditContent" class="modal-block modal-block-primary mfp-hide">
    <section class="card">
        <form action="" id="menu-item-edit-form">
            <header class="card-header">
                <h2 class="card-title">Edit Url</h2>
            </header>
            <div class="card-body">
                <div class="modal-wrapper">

                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label class="control-label">Name
                                <span class="required">*</span>
                            </label>
                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                <input type="text" name="name" id="name" class="form-control"
                                       placeholder="Url name" required />
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="control-label">Url
                                <span class="required">*</span>
                            </label>
                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                <input type="text" name="url" id="url" class="form-control"
                                       placeholder="Url" required />
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="control-label">Route Name
                                <span class="required">*</span>
                            </label>
                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-briefcase"></i>
                                                </span>
                                <input type="text" name="routeName" id="routeName" class="form-control"
                                       placeholder="Route Name" required />
                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="control-label">Url Group
                                <span class="required">*</span>
                            </label>
                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-user-circle"></i>
                                                </span>
                                <select class="form-control" data-plugin-selectTwo data-plugin-options='{"dropdownAutoWidth": true, "width": "100%"}'
                                        name="urlGroup" id="urlGroup" required>
                                    <option value="">-- Select Url Group--</option>
                                    @foreach($urlGroups as $urlGroup)
                                        <option value="{{ $urlGroup->name }}">{{ $urlGroup->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div class="input-group pt-3">
                                <button type="submit" class="btn btn-primary mt-3"> Add Url</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <footer class="card-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary modal-confirm">Confirm</button>
                        <button class="btn btn-default modal-dismiss">Cancel</button>
                    </div>
                </div>
            </footer>
        </form>
    </section>
</div>