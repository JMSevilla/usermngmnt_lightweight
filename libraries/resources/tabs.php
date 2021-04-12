<!-- Tabs navs -->
<ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a
      class="nav-link active"
      id="ex2-tab-1"
      data-mdb-toggle="tab"
      href="#ex2-tabs-1"
      role="tab"
      aria-controls="ex2-tabs-1"
      aria-selected="true"
      >Sign in</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="ex2-tab-2"
      data-mdb-toggle="tab"
      href="#ex2-tabs-2"
      role="tab"
      aria-controls="ex2-tabs-2"
      aria-selected="false"
      >Registration</a
    >
  </li>
 
</ul>
<!-- Tabs navs -->

<!-- Tabs content -->
<div class="tab-content" id="ex2-content">
  <div
    class="tab-pane fade show active"
    id="ex2-tabs-1"
    role="tabpanel"
    aria-labelledby="ex2-tab-1"
  >
  <?php include("libraries/resources/credentials/signin.php"); ?>
  </div>
  <div
    class="tab-pane fade"
    id="ex2-tabs-2"
    role="tabpanel"
    aria-labelledby="ex2-tab-2"
  >
    <?php include("libraries/resources/credentials/registration.php"); ?>
  </div>
  
</div>
<!-- Tabs content -->