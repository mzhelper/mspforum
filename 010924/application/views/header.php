    <div id="bg-header" class="navbar navbar-expand d-flex navbar-dark justify-content-between bd-navbar blue accent-3 shadow">
        <div class="relative" style="width:100%;">
            <div class="d-flex" style="width:100%;">
                <div>
                    <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                        <i></i>
                    </a>
                </div>
                <div class="d-none d-md-block">
                    <h1 class="nav-title text-white">HLF MSP Indonesia 2024</h1>
                </div>
                <?php if($this->uri->segment(5) >= 8) {?>
                <div style="float:right;width:100%;margin-top:6px;">
                  <button type="button" name="finish_btn" value="1" class="btn btn-danger btn-sm float-right width-100 btn_finish_btn">Next & Finish</button>
                </div>
                <?php }?>
            </div>
        </div>
    </div>