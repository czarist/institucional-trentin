<!doctype html>
	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">

		<!-- TailwindCSS CDN + config -->
		<script src="https://cdn.tailwindcss.com"></script>
		<script>
		  tailwind.config = {
		    theme: {
		      extend: {
		        colors: {
		          primary: '#006241',
		          primaryLight: '#00A878',
		          dark: '#212121',
		          light: '#F1F1F1',
		          accent: '#CFA15A',
		        },
		        fontFamily: {
		          sans: ['Inter', 'system-ui', 'ui-sans-serif'],
		          display: ['Montserrat', 'Inter', 'ui-sans-serif']
		        },
		        boxShadow: {
		          soft: '0 10px 30px rgba(0,0,0,0.10)'
		        },
		        backgroundImage: {
		          'grid': "linear-gradient(rgba(255,255,255,0.06) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.06) 1px, transparent 1px)",
		        }
		      }
		    }
		  }
		</script>

		<!-- AOS Animations -->
		<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
		<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/style.css">
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/scripts.js"></script>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#006241">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<style>
			html { scroll-behavior: smooth; }
			body { font-family: Inter, system-ui, sans-serif; }
		</style>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body	     	      <?php body_class('bg-light text-dark'); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">

			<!-- Top bar -->
			<div class="w-full bg-primary text-white text-xs md:text-sm" data-aos="fade-down">
				<div class="max-w-7xl mx-auto px-4 py-2 flex items-center justify-between">
					<span><i class="fas fa-code mr-2"></i><?php bloginfo('name'); ?></span>
					<div class="hidden sm:flex items-center gap-4 opacity-90">
						<a href="mailto:contato@trentin.dev" class="hover:underline"><i class="fas fa-envelope mr-1"></i>contato@trentin.dev</a>
						<a href="#contato" class="hover:underline"><i class="fas fa-comments mr-1"></i>Fale conosco</a>
					</div>
				</div>
			</div>

			<!-- Header / Navbar -->
			<header class="sticky top-0 z-40 backdrop-blur bg-white/80 border-b border-black/5" role="banner" itemscope itemtype="http://schema.org/WPHeader" data-aos="fade-down">
				<div class="max-w-7xl mx-auto px-4">
					<div class="flex items-center justify-between h-16">
						<a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2" rel="home">
							<span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-primary text-white font-display text-xl shadow-soft">
								<i class="fas fa-dragon"></i>
							</span>
							<span class="font-display text-lg md:text-xl tracking-tight text-dark"><?php bloginfo('name'); ?></span>
						</a>
						<nav class="hidden md:flex items-center gap-6 font-medium" aria-label="Menu principal">
							<a href="#servicos" class="hover:text-primary">Serviços</a>
							<a href="#produtos" class="hover:text-primary">Produtos</a>
							<a href="#processo" class="hover:text-primary">Processo</a>
							<a href="#sobre" class="hover:text-primary">Sobre</a>
							<a href="#contato" class="px-4 py-2 rounded-lg bg-primary text-white hover:bg-primaryLight transition">Orçamento</a>
						</nav>
						<button id="btnMenu" class="md:hidden p-2 rounded-lg border border-black/10" aria-label="Abrir menu"><i class="fas fa-bars"></i></button>
					</div>
				</div>
				<div id="mobileMenu" class="md:hidden hidden border-t border-black/5 bg-white/95">
					<nav class="max-w-7xl mx-auto px-4 py-3 grid gap-3" aria-label="Menu principal mobile">
						<a href="#servicos" class="py-2"><i class="fas fa-cogs mr-2"></i>Serviços</a>
						<a href="#produtos" class="py-2"><i class="fas fa-box-open mr-2"></i>Produtos</a>
						<a href="#processo" class="py-2"><i class="fas fa-project-diagram mr-2"></i>Processo</a>
						<a href="#sobre" class="py-2"><i class="fas fa-users mr-2"></i>Sobre</a>
						<a href="#contato" class="py-2 text-white bg-primary rounded-lg text-center"><i class="fas fa-paper-plane mr-2"></i>Orçamento</a>
					</nav>
				</div>
			</header>
