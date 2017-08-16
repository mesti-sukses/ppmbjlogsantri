<main class="main-content container">
  <div class="page-header">
    <h1>Book <small class="roboto-light">knowledge is a power</small></h1>
  </div>
  <?php foreach ($bookData as $book): ?>
    <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading clean">
          <?php echo $book->title ?>
        </div>

        <div class="panel-body">
          <div class="col-md-4 col-sm-6">
            <img src="<?php echo base_url('images/Post/Book/'.$book->image) ?>" class="img-responsive" style="margin-bottom: 24px;">
          </div>
          <div class="col-md-8 col-sm-6 col-xs-12 pull-right movie-info">
            <table class="meta">
              <tr>
                <td class="roboto-slab">Language </td>
                <td>: <?php echo $book->language ?></td>
              </tr>
              <tr>
                <td class="roboto-slab">Release Date </td>
                <td>: <?php echo $book->realease ?></td>
              </tr>
              <tr>
              <tr>
                <td class="roboto-slab">Author </td>
                <td>: <?php echo $book->author ?></td>
              </tr>
                <td class="roboto-slab">Publisher </td>
                <td>: <?php echo $book->publisher ?></td>
              </tr>
              <tr>
                <td class="roboto-slab">Tags </td>
                <td>: <?php echo $book->tags ?></td>
              </tr>
            </table>
            <div class="rating">
              <?php
                $rat = (int)$book->rating;
                $zero = 10-$rat;
                while($rat > 1){
                  echo '<i class="fa fa-star"></i>';
                  $rat -= 2;
                }

                if($rat == 1) echo '<i class="fa fa-star-half-o"></i>';

                while($zero > 1){
                  echo '<i class="fa fa-star-o"></i>';
                  $zero -= 2;
                }
              ?>
            </div>
            <ul class="action">
              <li style="background-color: #00b4ff"><a href="<?php echo base_url('admin/book/edit/'.$book->id) ?>"><i class="fa fa-pencil"></i></a></li>
              <li style="background-color: #ff1942"><a href=""><i class="fa fa-trash"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</main>