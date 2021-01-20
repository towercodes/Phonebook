<html>
<body>
<?= \Config\Services::validation()->listErrors(); ?>
<?php echo anchor(base_url('Phonebook/index'), 'Home'); ?>
<form action = "<?php echo base_url('Phonebook/searchresults'); ?>" method = 'post'>
    <?= csrf_field() ?>
<input type = "text" name = "search" required> <br>
<input type = "submit" name = "form"  value = "search Contacts">
</form>
<?php echo anchor(base_url('Phonebook/create'), 'Create New Contact'); ?>
<h1>My Phonebook</h1>
