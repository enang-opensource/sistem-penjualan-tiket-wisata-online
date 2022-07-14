<?= $this->extend('\App\Views\guest\pages\template\layout'); ?>
<?= $this->section('content'); ?>

<section class="hero-wrap hero-wrap-2 js-fullheight"
style="background-image: url('<?= base_url(); ?>/guests/images/bg_1.jpg');">
<div class="overlay"></div>
<div class="container">
  <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
    <div class="col-md-9 ftco-animate pb-5 text-center">
      <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url(); ?>">Home <i
        class="fa fa-chevron-right"></i></a></span> <span>Detail Budaya<i
          class="fa fa-chevron-right"></i></span></p>
          <h1 class="mb-0 bread"><?= $informasi['judul_informasi']; ?></h1>
        </div>
      </div>
    </div>
  </section>

  <!--================Blog Area =================-->
  <br>
  <section class="blog_area single-post-area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 posts-list">
          <div class="single-post">
            <div class="feature-img">
              <img class="img-fluid" src="<?= base_url($informasi['gambar_informasi']); ?>" alt="">
            </div>
            <div class="blog_details">
              <h2><?= $informasi['judul_informasi']; ?></h2>
              <p class="excert">
                <?= $informasi['kontent_informasi']; ?>
              </p>

            </div>
          </div>

          <hr/>

          <div class="comments-area">
            <h3>Komentar</h3>
            <?php if ($komentars==null): ?>
              <div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                  <div class="user justify-content-between d-flex">
                    <div class="desc">
                      <p class="comment">
                        Jadilah orang pertama yang mengomentari postingan ini!
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            <?php else: ?>
              <?php foreach ($komentars as $value): ?>
                <div class="comment-list">
                  <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                      <div class="desc">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex align-items-center">
                            <h6 style="line-height:1;">
                              <a href="#"><?= $value['fname']; ?> <?= $value['lname']; ?></a>
                              <p class="date"><?= date("F d, Y", strtotime($value['tanggal_komentar'])); ?></p>
                            </h6>
                          </div>
                        </div>
                        <p class="comment" style="margin-top:0px;">
                          <?= $value['text_komentar']; ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <div class="comment-form">
            <h4>Leave a Reply</h4>
            <form class="form-contact comment_form" action="<?= base_url('guest/add_komentar'); ?>" method="post">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <input type="hidden" name="id_informasi" value="<?= $id_informasi; ?>">
                    <textarea class="form-control w-100" name="komentar" cols="10" rows="3"
                    placeholder="Write Comment"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <?php if (session()->get('id_user')==null): ?>
                  <a href="<?= base_url('login'); ?>" class="btn btn-info">Send Message</a>
                <?php else: ?>
                  <button type="submit" class="btn btn-info">Send Message</button>
                <?php endif; ?>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--================ Blog Area end =================-->

  <?= $this->endSection(); ?>
