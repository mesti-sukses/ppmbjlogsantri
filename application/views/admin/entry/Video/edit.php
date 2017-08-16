<main class="main-content container">
  <div class="row">
    <?php echo form_open_multipart('', array('class' => 'form-horizontal form-label-left')) ?>
    <div class="page-header">
      <h1><?php echo $page_info['title'] ?></h1>
    </div>
  </div>
  <?php
    $e = (isset($videoData)) ? TRUE : FALSE;
    if(isset($error)) echo $error;
  ?>
  <div class="col-lg-8">
    <div class="row">

      <div class="panel panel-default">
        <div class="panel-heading clean">
          Summary
        </div>

        <div class="panel-body">

          <div class="form-group">
            <input class="form-control" name="title" type="text" placeholder="Enter Movie Title" value="<?php if($e) echo $videoData->title ?>">
          </div>

          <div class="form-group">
            <textarea name="summary" class="form-control" placeholder="Enter Movie Summary"><?php if($e) echo $videoData->summary ?></textarea>
          </div>
          
        </div>
      </div>

    </div>

    <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading clean">
          Synopsis
        </div>

        <div class="panel-body">
          <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">

            <div class="btn-group">
              <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>

              <ul class="dropdown-menu">
                <li>
                  <a data-edit="fontSize 5">
                  <p style="font-size:17px">Huge</p></a>
                </li>


                <li>
                  <a data-edit="fontSize 3">
                  <p style="font-size:14px">Normal</p></a>
                </li>


                <li>
                  <a data-edit="fontSize 1">
                  <p style="font-size:11px">Small</p></a>
                </li>
              </ul>
            </div>


            <div class="btn-group">
              <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a> <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a> <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a> <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
            </div>


            <div class="btn-group">
              <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a> <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a> <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a> <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
            </div>


            <div class="btn-group">
              <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a> <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a> <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
            </div>


            <div class="btn-group">
              <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>

              <div class="dropdown-menu input-append">
                <input class="span2" data-edit="createLink" placeholder="URL" type="text"> <button class="btn" type="button">Add</button>
              </div>
              <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
            </div>

          </div>


          <div id="editor">
            <?php if($e) echo $videoData->synopsis ?>
          </div>

          <textarea id="descr" name="synopsis" style="display:none;"></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 pull-right">
    <div class="row">

      <div class="panel panel-default">
        <div class="panel-heading clean">
          Featured Image
        </div>

        <div class="panel-body">
          <img id="blah" class="img-responsive" src="<?php if($e) echo base_url('images/Post/Video/'.$videoData->image); else echo base_url('images/no-image-landscape.png') ?>" alt="your image" style="margin-bottom: 15px" />

          <div class="form-group">
            <input class="form-control" name="image" id="imgInp" type="file" value="<?php if($e) echo base_url('images/Post/Video/'.$videoData->image) ?>">
          </div>

          <div class="form-group">
            <button class="submit btn btn-success pull-right" type="submit">Submit</button>
          </div>
          
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading clean">
          Movie Information
        </div>

        <div class="panel-body">

        <span style="display: block; margin-left: 12px; margin-bottom: 6px;">Rating</span>

        <fieldset class="rate">
          <input type="radio" id="rating10" name="rating" value="10" /><label for="rating10" title="5 stars"></label>
          <input type="radio" id="rating9" name="rating" value="9" /><label class="half" for="rating9" title="4 1/2 stars"></label>
          <input type="radio" id="rating8" name="rating" value="8" /><label for="rating8" title="4 stars"></label>
          <input type="radio" id="rating7" name="rating" value="7" /><label class="half" for="rating7" title="3 1/2 stars"></label>
          <input type="radio" id="rating6" name="rating" value="6" /><label for="rating6" title="3 stars"></label>
          <input type="radio" id="rating5" name="rating" value="5" /><label class="half" for="rating5" title="2 1/2 stars"></label>
          <input type="radio" id="rating4" name="rating" value="4" /><label for="rating4" title="2 stars"></label>
          <input type="radio" id="rating3" name="rating" value="3" /><label class="half" for="rating3" title="1 1/2 stars"></label>
          <input type="radio" id="rating2" name="rating" value="2" /><label for="rating2" title="1 star"></label>
          <input type="radio" id="rating1" name="rating" value="1" /><label class="half" for="rating1" title="1/2 star"></label>
      </fieldset>

          <div class="form-group">
            <input class="form-control" id="datetimepicker" name="realease" type="text" placeholder="Release Date" value="<?php if($e) echo $videoData->realease ?>">
          </div>

          <div class="form-group">
            <input class="form-control" name="language" type="text" placeholder="Language" value="<?php if($e) echo $videoData->language ?>">
          </div>          
          
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading clean">
          Additional Information
        </div>

        <div class="panel-body">
          <small>Enter to add tags</small>
          <div class="form-group">
            <input class="form-control tagsinput" name="tags" type="text" placeholder="Tags" value="<?php if($e) echo $videoData->tags ?>">
          </div>
          
        </div>
      </div>
    </div>
  </div>
</main>