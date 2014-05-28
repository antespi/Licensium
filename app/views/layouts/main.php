<?php
  // Yii::app()->bootstrap->register();
  Yii::app()->assets->registerCss();
  Yii::app()->assets->registerScripts();
  $shiv  = 'html5shiv-3.7.0';
  $shiv .= YII_DEBUG ? '.js' : '.min.js';
  $respond  = 'respond-1.3.0';
  $respond .= YII_DEBUG ? '.js' : '.min.js';

  $flashMessages = Yii::app()->user->getFlashes(true);

  $section = array('label' => 'Home');
  $menuitems_login = array(
    // array('label' => Yii::t('app', 'Profile'),    'url' => 'user'),
    array('label' => Yii::t('app', 'Projects'),   'url' => 'project'),
  );
  $menuitems_logout = array(
    array('label' => Yii::t('app', 'About Us'),    'url' => '/site/page/view/about'),
    array('label' => Yii::t('app', 'Target'),      'url' => '/site/page/view/target'),
    array('label' => Yii::t('app', 'Contact'),     'url' => 'http://www.cohaerentis.com/datos-de-contacto'),

  );
  $main_menu = array();
  $currentaction = Yii::app()->urlManager->parseUrl(Yii::app()->request);
  $parts = explode('/', $currentaction);
  $currentitem = '';
  if (!empty($parts[0])) $currentitem .= $parts[0];
  if (!empty($parts[1])) $currentitem .= '/'. $parts[1];

  $name = '';
  $login = array();
  $signup = array();
  $log_class = '';
  if (Yii::app()->user->isGuest) {
    $login = array('class' => 'login', 'label' => Yii::t('app', 'Login'), 'url' => 'user/login');
    $signup = array('class' => 'signup', 'label' => Yii::t('app', 'Signup'), 'url' => 'user/signup');
    $log_class = 'log_class';
    $main_menu = $menuitems_logout;
    $footer_col = 'col-lg-6 col-md-8 col-sm-6 col-xs-12';
    $footer_left = 'col-lg-6 col-md-4 col-sm-6 col-xs-12';
    $footer_logo = 'footer-logo-logout';
  } else {
    $name = Yii::app()->user->firstname . ' ' . Yii::app()->user->lastname;
    $login = array('class' => 'loggedin', 'label' => $name, 'url' => 'user');
    $signup = array('class' => 'logout', 'label' => '<i class="glyphicon glyphicon-off "></i>', 'url' => 'user/logout');
    $main_menu = $menuitems_login;
    $footer_col = 'col-lg-4 col-md-4 col-sm-4 col-xs-6';
    $footer_left = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
    $footer_logo = 'footer-logo-login';
  }

  $languages = array(
    'es' => array('label' => 'Español', 'url' => '?lang=es'),
    'en' => array('label' => 'English', 'url' => '?lang=en'),
  );
  $currentlang = 'es';

?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->assets->url . '/' . $shiv; ?>"></script>
    <script src="<?php echo Yii::app()->assets->url . '/' . $respond; ?>"></script>
  <![endif]-->

  <title><?php echo e($this->pageTitle); ?></title>
</head>
<body>
  <header>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo baseUrl(); ?>">
              <img src="/img/logo.png"/>
              <span class="logo-title"><?php echo Yii::app()->name; ?></span>
          </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <?php foreach ($main_menu as $item): ?>
              <li <?php if ($currentitem == $item['url']) echo 'class="active"'; ?>>
                <a href="<?php echo baseUrl($item['url']); ?>">
                  <?php echo $item['label']; ?>
                </a>
              </li>
            <?php endforeach ?>
          </ul>
          <div class="row userbox">
            <div class="col-lg-12 col-md-12 col-xs-12 language">
            <a href="#"><div class="single-language">es</div></a>
            <a href="#"><div class="single-language current">en</div></a>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12 log loginuser <?php echo $log_class;?>">
              <div class="<?php echo $login['class']; ?>">
                <a href="<?php echo baseUrl($login['url']); ?>">
                  <?php echo $login['label']; ?>
                </a>
              </div>
              <?php if (!empty($signup)) : ?>
                <div class="<?php echo $signup['class']; ?>">
                  <a href="<?php echo baseUrl($signup['url']); ?>">
                    <?php echo $signup['label']; ?>
                  </a>
                </div>
              <?php endif; ?>
            </div>
          </div><!-- /.login-->
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </header>

  <ol class="breadcrumb">
      <li><a href="<?php echo baseUrl(); ?>">Home</a></li>
      <li class="active">Proyectos</li>
  </ol>

  <?php if ($flashMessages) : ?>
  <div class="container">
      <?php foreach($flashMessages as $key => $message) : ?>
          <div class="alert alert-<?php echo $key; ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $message; ?>
          </div>
      <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <main class="wrap">
    <?php echo $content; ?>
  </main>

  <footer>
    <div class="row footer">
        <div class="<?php echo $footer_left; ?>">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 footer-left">
                    <a target="_blank" href ='https://github.com/Teachnova/Licensium/blob/master/LICENSE'><p><?php echo Yii::t('app', 'License'); ?></p>
                    <i class="glyphicon glyphicon-bookmark"></i></a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 footer-left">
                    <a target="_blank" href ='https://github.com/Teachnova/Licensium/'><p><?php echo Yii::t('app', 'Source Code'); ?></p>
                    <i class="glyphicon glyphicon-link"></i></a>
                </div>
            </div>
        </div>
        <div class="<?php echo $footer_col; echo ' '.$footer_logo; ?>">
            <a href="http://www.cohaerentis.com"><img src ="/img/cohaerentis.png"/></a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
            <?php if (Yii::app()->user->isGuest) :?>
            <?php else :?>
                <ul class="nav navbar-nav footer-links">
                    <?php foreach ($menuitems_logout as $item): ?>
                        <li <?php if ($currentitem == $item['url']) echo 'class="active"'; ?>>
                            <a href="<?php echo baseUrl($item['url']); ?>">
                                <?php echo $item['label']; ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-bottom">
            <p><?php echo Yii::t('app', 'Licensium is a Cohaerentis Consultores product, strategic business consulting for open business models. &copy; 2014')  ?></p>
        </div>
      
    </div>
  </footer>

  </body>
</html>

