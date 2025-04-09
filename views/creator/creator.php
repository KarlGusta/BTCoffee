<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../includes/header.php';
?>

<div class="page-wrapper">
  <div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row g-2 align-items-center">
        <!-- Empty for spacing purposes -->
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-deck row-cards">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <div class="col">
                <h2 class="h3">About The Thrill Of The Thrift</h2>
                <p class="mb-2 text-muted">I create a variety of content but mainly thrifting videos.</p>
                <a href="#" class="d-block"><img src="<?php echo path('assets', 'img'); ?>karl_image.png" class="card-img-top" style="max-height: 320px; object-fit: cover;"></a>
                <p class="mt-2 text-muted">I am an avid thrifter & reseller on Youtube Ebay & Mercari. I offer a variety of content including Thrift Hauls, Shop Along's, Diy's, Crafts, Cooking & Baking. </p>
                <hr>
                <div class="divide-y">
                  <div>
                    <div class="row">
                      <div class="col-auto">
                        <span class="avatar">JL</span>
                      </div>
                      <div class="col">
                        <div class="text-truncate">
                          <strong>Jeffie Lewzey</strong> commented on your <strong>"I'm not a witch."</strong> post.
                        </div>
                        <div class="text-muted">yesterday</div>
                      </div>
                      <div class="col-auto align-self-center">
                        <div class="badge bg-primary"></div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="row">
                      <div class="col-auto">
                        <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                      </div>
                      <div class="col">
                        <div class="text-truncate">
                          It's <strong>Mallory Hulme</strong>'s birthday. Wish him well!
                        </div>
                        <div class="text-muted">2 days ago</div>
                      </div>
                      <div class="col-auto align-self-center">
                        <div class="badge bg-primary"></div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="row">
                      <div class="col-auto">
                        <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                      </div>
                      <div class="col">
                        <div class="text-truncate">
                          <strong>Dunn Slane</strong> posted <strong>"Well, what do you want?"</strong>.
                        </div>
                        <div class="text-muted">today</div>
                      </div>
                      <div class="col-auto align-self-center">
                        <div class="badge bg-primary"></div>
                      </div>
                    </div>
                  </div>     
                  <div>
                    <div class="row">
                      <div class="col-auto">
                        <span class="avatar" style="background-image: url(./static/avatars/003m.jpg)"></span>
                      </div>
                      <div class="col">
                        <div class="text-truncate">
                          <strong>Dunn Slane</strong> posted <strong>"Well, what do you want?"</strong>.
                        </div>
                        <div class="text-muted">today</div>
                      </div>
                      <div class="col-auto align-self-center">
                        <div class="badge bg-primary"></div>
                      </div>
                    </div>
                  </div>    
                  <div>
                    <div class="row">
                      <div class="col-auto">
                        <span class="avatar">AA</span>
                      </div>
                      <div class="col">
                        <div class="text-truncate">
                          <strong>Arlie Armstead</strong> sent a Review Request to <strong>Amanda Blake</strong>.
                        </div>
                        <div class="text-muted">2 days ago</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Buy The Thrill Of The Thrift a coffee</h3>
            </div>
            <div class="card-body">
              <form>
                <div class="form-group mb-3 ">
                  <div>
                    <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                </div>
                <div class="form-group mb-3 ">
                  <div>
                    <input type="password" class="form-control" placeholder="Password">
                  </div>
                </div>
                <div class="form-footer">
                  <button type="submit" class="btn btn-primary w-100 form-control-rounded">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include '../../includes/footer.php'; ?>