<main class="main-content container">
  <div class="row">
    <?php echo form_open_multipart('', array('class' => 'form-horizontal form-label-left')) ?>
    <div class="page-header">
      <h1><?php echo $page_info['title'] ?></h1>
    </div>
  </div>
  <?php
    $e = (isset($bookData)) ? TRUE : FALSE;
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
            <input class="form-control" name="title" type="text" placeholder="Enter Book Title" value="<?php if($e) echo $bookData->title ?>">
          </div>

          <div class="form-group">
            <textarea name="summary" class="form-control" placeholder="Enter Book Lyrics" style="min-height: 500px"><?php if($e) echo $bookData->summary ?></textarea>
          </div>
          
        </div>
      </div>

    </div>
  </div>
  <div class="col-lg-3 pull-right">
    <div class="row">

      <div class="panel panel-default">
        <div class="panel-heading clean">
          Album Cover
        </div>

        <div class="panel-body">
          <img id="blah" class="img-responsive" src="<?php if($e) echo base_url('images/Post/Book/'.$bookData->image); else echo base_url('images/no-image-landscape.png') ?>" alt="your image" style="margin-bottom: 15px" />

          <div class="form-group">
            <input class="form-control" name="image" id="imgInp" type="file" value="<?php if($e) echo base_url('images/Post/Book/'.$bookData->image) ?>">
          </div>

          <div class="form-group">
            <button class="submit btn btn-success pull-right" type="submit">Submit</button>
          </div>
          
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading clean">
          Book Information
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
            <input class="form-control" id="datetimepicker" name="realease" type="text" placeholder="Release Date" value="<?php if($e) echo $bookData->realease ?>">
          </div>

          <div class="form-group">
            <input class="form-control" name="language" type="text" placeholder="Language" value="<?php if($e) echo $bookData->language ?>">
          </div>

          <div class="form-group">
            <input class="form-control" name="author" type="text" placeholder="Author" value="<?php if($e) echo $bookData->author ?>">
          </div>

          <div class="form-group">
            <input class="form-control" name="publisher" type="text" placeholder="Publisher" value="<?php if($e) echo $bookData->publisher ?>">
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
            <input class="form-control tagsinput" name="tags" type="text" placeholder="Tags" value="<?php if($e) echo $bookData->tags ?>">
          </div>
          
        </div>
      </div>
    </div>
  </div>
</main>