Hello <?php echo e($user->name); ?>,<br><br>

Welcome to The Lowcountry Bridge Connection! <br><br>


It is important that we have an accurate email address to notify you about enrollments and upcoming events so please confirm your email address by clicking the link below.
<br><br>


<a href="<?php echo e($link = route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email)); ?>">Confirm email address</a>
<br><br>

Thanks,<br>
