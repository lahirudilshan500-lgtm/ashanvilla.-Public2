<?php
session_start();
$notice = '';
$noticeType = 'success';
if (isset($_GET['sent'])) {
    $notice = 'Thank you! Your message was submitted. The demo form does not send email until you configure it on your server.';
}
if (isset($_GET['booked'])) {
    $notice = 'Your booking request was received by this demo website. Please contact the villa to confirm availability.';
}
$today = date('Y-m-d');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Relax in a calm, welcoming private villa with a four-poster bed, warm interiors and a peaceful atmosphere.">
  <title>Ashan Villa | A Peaceful Stay</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header">
  <a class="brand" href="#home" aria-label="Ashan Villa home"><span class="brand-mark">A</span><span>Ashan Villa <small>VILLA & RETREAT</small></span></a>
  <button class="menu-toggle" aria-label="Open navigation" aria-expanded="false">☰</button>
  <nav class="main-nav" aria-label="Main navigation">
    <a href="#home">Home</a><a href="room2.html">Room2</a><a href="#stay">The Villa</a><a href="#gallery">Gallery</a><a href="#amenities">Amenities</a><a href="#contact">Contact</a>
    <a class="nav-book" href="#booking">Book your stay <span>↗</span></a>
  </nav>
</header>

<main>
<section class="hero" id="home">
  <div class="hero-image"></div>
  <div class="hero-content">
    <p class="eyebrow"><span></span> YOUR PRIVATE PLACE TO UNWIND</p>
    <h1>Slow down.<br><em>Feel at home.</em></h1>
    <p class="hero-copy">A welcoming villa for restful nights, unhurried mornings and little moments worth remembering.</p>
    <div class="hero-actions"><a class="button button-dark" href="#booking">Check availability <span>↗</span></a><a class="text-link" href="#stay">Explore the villa <span>↓</span></a></div>
    <div class="hero-note"><span class="note-icon">✳</span><span><strong>A stay made for comfort</strong><small>Thoughtful details, warm hospitality</small></span></div>
  </div>
  <div class="hero-caption">A QUIET CORNER OF COMFORT <span>01 / 04</span></div>
</section>

<div class="intro-strip"><span>REST EASY</span><i>✳</i><span>STAY A LITTLE LONGER</span><i>✳</i><span>MAKE YOURSELF AT HOME</span><i>✳</i><span>REST EASY</span></div>

<section class="section stay-section" id="stay">
  <div class="section-heading"><p class="eyebrow">WELCOME TO Ashan Villa</p><h2>Comfort with a<br><em>touch of character.</em></h2></div>
  <div class="stay-layout">
    <div class="stay-photo-wrap"><img src="assets/bedroom-1.jpg" alt="Warm bedroom with a handcrafted wooden four-poster bed"><span class="photo-tag">YOUR HOME AWAY FROM HOME</span></div>
    <div class="stay-copy"><p class="large-copy">Come in, put your bags down, and let the pace of the day soften.</p><p>Welcome to Ashan Villa, a new private 2-bedroom villa in Ahungalla, just a 5-minute walk to the beach. Both bedrooms have attached bathrooms with hot water; one bedroom includes AC and the other has a fan. Ideal for families or friends seeking a peaceful beach holiday. Free WiFi and parking available. Optional Sri Lankan breakfast available for $5 per person per day. We can also help arrange airport transfers and exciting local tours</p><p>Whether you are visiting for a short escape or a longer stay, we want you to feel relaxed from the moment you arrive.</p><a class="text-link underline-link" href="#gallery">Take a look around <span>↗</span></a><div class="mini-stat"><strong>01</strong><span>Private villa experience<br><small>Designed for a relaxed stay</small></span></div></div>
  </div>
</section>

<section class="section gallery-section" id="gallery">
  <div class="gallery-top"><div><p class="eyebrow">A CLOSER LOOK</p><h2>Spaces to <em>settle into.</em></h2></div><p>Natural textures, warm wood and little touches that make a room feel welcoming.</p></div>
  <div class="gallery-grid">
    <button class="gallery-item gallery-large" data-full="assets/bedroom-2.jpg" aria-label="View bedroom photo"><img src="assets/bedroom-2.jpg" alt="Four-poster bed and golden curtains"><span>01 <b>THE BEDROOM</b> ↗</span></button>
    <button class="gallery-item" data-full="assets/bathroom-1.jpg" aria-label="View bathroom photo"><img src="assets/bathroom-1.jpg" alt="Private bathroom with stone-textured walls"><span>02 <b>THE BATHROOM</b> ↗</span></button>
    <button class="gallery-item" data-full="assets/bedroom-3.jpg" aria-label="View bedroom detail photo"><img src="assets/bedroom-3.jpg" alt="Wooden bed and soft golden bedding"><span>03 <b>THE DETAILS</b> ↗</span></button>
    <button class="gallery-item" data-full="assets/bathroom-2.jpg" aria-label="View bathroom detail photo"><img src="assets/bathroom-2.jpg" alt="Clean, modern bathroom vanity and mirror"><span>04 <b>FRESH & SIMPLE</b> ↗</span></button>
  </div>
</section>

<section class="amenities-section" id="amenities"><div class="amenities-inner">
  <div><p class="eyebrow">THE LITTLE THINGS</p><h2>Everything you need.<br><em>Nothing you don't.</em></h2><p class="amenities-intro">A straightforward, comfortable stay with the essentials taken care of.</p></div>
  <div class="amenity-list">
    <div class="amenity"><span>01</span><div><h3>Comfortable bedroom</h3><p>Relax in a spacious bed with soft linens.</p></div><b>↗</b></div>
    <div class="amenity"><span>02</span><div><h3>Private bathroom</h3><p>Your own bathroom with a vanity and shower area.</p></div><b>↗</b></div>
    <div class="amenity"><span>03</span><div><h3>Peaceful atmosphere</h3><p>A calm setting for rest and quality time.</p></div><b>↗</b></div>
    <div class="amenity"><span>04</span><div><h3>Personal hospitality</h3><p>Contact us directly for help planning your visit.</p></div><b>↗</b></div>
  </div>
</div></section>

<section class="booking-section" id="booking">
  <div class="booking-image"><img src="assets/bedroom-4.jpg" alt="Villa bedroom ready for guests"><div class="booking-image-label">YOUR NEXT ESCAPE STARTS HERE</div></div>
  <div class="booking-panel"><p class="eyebrow">MAKE IT YOURS</p><h2>Stay a while.</h2><p>Send us your dates and we’ll get back to you to confirm availability and details.</p>
    <?php if ($notice): ?><div class="notice <?= htmlspecialchars($noticeType) ?>" role="status"><?= htmlspecialchars($notice) ?></div><?php endif; ?>
    <form action="booking.php" method="post" class="booking-form">
      <label for="guest-name">Your name</label><input id="guest-name" name="name" autocomplete="name" required maxlength="100" placeholder="Full name">
      <div class="form-row"><div><label for="checkin">Check-in</label><input type="date" id="checkin" name="checkin" min="<?= htmlspecialchars($today) ?>" required></div><div><label for="checkout">Check-out</label><input type="date" id="checkout" name="checkout" min="<?= htmlspecialchars($today) ?>" required></div></div>
      <div class="form-row"><div><label for="guests">Guests</label><select id="guests" name="guests" required><option value="1">1 guest</option><option value="2" selected>2 guests</option><option value="3">3 guests</option><option value="4">4 guests</option><option value="5">5 guests</option><option value="6">6 guests</option></select></div><div><label for="email">Email</label><input type="email" id="email" name="email" autocomplete="email" required placeholder="you@example.com"></div></div>
      <label for="phone">Phone / WhatsApp</label><input id="phone" name="phone" autocomplete="tel" maxlength="30" placeholder="+94 ...">
      <label for="requests">Special requests <span class="optional">(optional)</span></label><textarea id="requests" name="requests" rows="3" maxlength="1000" placeholder="Anything we should know?"></textarea>
      <button class="button button-dark button-full" type="submit">Send booking request <span>↗</span></button>
	  <button class="button button-dark button-full" type="submit"><a href=" https://www.booking.com/Share-jK7wboW">online booking</a> <span>↗</span></button>
       
    </form>
  </div>
</section>

<section class="contact-section section" id="contact"><div class="contact-copy"><p class="eyebrow">LET'S TALK</p><h2>Have a question?<br><em>We're here to help.</em></h2><p>Ask about availability, your visit or anything else you would like to know before booking.</p><div class="contact-detail"><span>✉</span><div><small>EMAIL</small><a href="ashanvilla@gmail.com">ashanvilla@gmail.com</a></div></div><div class="contact-detail"><span>⌕</span><div><small>PHONE / WHATSAPP</small><a href="tel:+94000000000">+94 766651538</a></div></div><p class="replace-note">No-218,Wathuregama,Ahungalla</p></div>
  <form class="contact-form" action="contact.php" method="post"><h3>Send us a message</h3><p>We'd love to hear from you.</p><label for="contact-name">Name</label><input id="contact-name" name="name" required maxlength="100" placeholder="Your name"><label for="contact-email">Email address</label><input type="email" id="contact-email" name="email" required maxlength="160" placeholder="you@example.com"><label for="subject">Subject</label><input id="subject" name="subject" required maxlength="160" placeholder="How can we help?"><label for="message">Message</label><textarea id="message" name="message" rows="4" required maxlength="3000" placeholder="Write your message here..."></textarea><button class="button button-outline button-full" type="submit">Send message <span>↗</span></button></form>
</section>
</main>

<footer class="footer"><a class="brand brand-light" href="#home"><span class="brand-mark">A</span><span>Ashan Villa <small>VILLA & RETREAT</small></span></a><p>A little space to breathe.</p><div class="footer-links"><a href="#stay">The villa</a><a href="#gallery">Gallery</a><a href="#booking">Booking</a><a href="#contact">Contact</a></div><small>© <?= date('Y') ?> Ashan Villa</small></footer>

<div class="lightbox" id="lightbox" aria-hidden="true"><button class="lightbox-close" aria-label="Close image">×</button><img src="" alt="Expanded villa photo"></div>
<script src="script.js"></script>
</body></html>