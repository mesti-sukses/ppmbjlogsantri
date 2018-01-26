<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Dashboard</h1>
    </div>
  </div>
  <!--/.row-->


  <div class="panel panel-container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            Biodata
          </div>


          <div class="panel-body">
            <ul>
              <li class="left clearfix" style="list-style: none;">
                <div class="chat-body clearfix">
                  <div class="header"><strong class="primary-font">NIS</strong></div>
                  <p><?php echo $userData->nis ?></p>
                </div>

                <div class="chat-body clearfix">
                  <div class="header"><strong class="primary-font">Nama</strong></div>
                  <p><?php echo $userData->nama ?></p>
                </div>

                <div class="chat-body clearfix">
                  <div class="header"><strong class="primary-font">Alamat</strong></div>
                  <p><?php echo $userData->alamat ?></p>
                </div>

                <div class="chat-body clearfix">
                  <div class="header"><strong class="primary-font">Pasus</strong></div>
                  <p><?php echo $userData->nama_pasus ?></p>
                </div>

                <?php if($userData->nama_wali != NULL) : ?>
                  <div class="chat-body clearfix">
                    <div class="header"><strong class="primary-font">Wali</strong></div>
                    <p><?php echo $userData->nama_wali ?></p>
                  </div>
                <?php endif; ?>

              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>