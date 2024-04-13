<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Profile</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <!-- Left-aligned 'Edit Profile' button -->
    <a href="raHome.php" class="nav-button left">Home</a>
    
    <!-- Right-aligned 'Find Listing', 'Find Agent', and 'Logout' buttons -->
    <div class="nav-buttons right">
        <a href="searchAgent.php" class="nav-button">Find Listing</a>
        <a href="searchListing.php" class="nav-button">Find Agent</a>
        <a href="logout.php" class="nav-button">Logout</a>
    </div>
</header>

<main>
    <h1>Edit Profile</h1>
    <form>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="...">
        
        <label for="description">Description</label>
        <textarea id="description" name="description">...</textarea>
        
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" value="...">
        
        <label for="contact">Contact</label>
        <input type="text" id="contact" name="contact" value="...">
        
        <input type="submit" value="Save changes">
    </form>
</main>

</body>
</html>
