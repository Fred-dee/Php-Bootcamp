<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "rush01";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else

// Create database
    $sql = "CREATE DATABASE IF NOT EXISTS rush01";
if (mysqli_query($conn, $sql)) {
    $sql = "USE rush01";
    mysqli_query($conn, $sql);
    $sql = "CREATE TABLE IF NOT EXISTS items(
	  ID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  category text NOT NULL,
	  Description mediumtext NOT NULL,
	  Price int(11) NOT NULL,
	  src text NOT NULL
	)";
    if (mysqli_query($conn, $sql)) {
        $sql = "INSERT INTO `items` (`ID`, `category`, `Description`, `Price`, `src`) VALUES
		(1, 'New;Women', 'Pair of white Spring flat walking Korean Student Boots', 250, 'https://ae01.alicdn.com/kf/HTB1HGErNXXXXXaUXpXXq6xXFXXXJ/Skateboarding-Shoes-women-leather-skateboard-sneakers-2016-new-low-classic-Spring-flat-walking-Korean-student-boots.jpg'),
		(2, 'New;All', 'Korean sports designer sneakers women shoes', 300, 'https://www.dhresource.com/0x0s/f2-albu-g5-M01-18-FF-rBVaJFkOhUaAQiPrAALUSR89108360.jpg/korean-sports-designer-sneakers-women-shoes.jpg'),
		(3, 'New;Women', 'Running Sneakers', 150, 'https://images-na.ssl-images-amazon.com/images/I/61C8E0HzIDL._SY355_.jpg'),
                (4, 'New;Men', 'Runnig Shoes Men ', 200, 'https://ae01.alicdn.com/kf/HTB1WYPyLXXXXXaXXVXXq6xXFXXXW/2016-new-running-shoes-men-spring-supper-light-flat-sneakers-Canvas-s-Non-slip-Lightweight-Sports.jpg'),
                (5, 'New;Men', 'Sneakers ', 80, 'https://ae01.alicdn.com/kf/HTB1i.yyQVXXXXcqapXXq6xXFXXXU/Man-Shoes-Sneakers-2016-Running-Sneakers-Sale-Men-Black-Green-Tracking-Shoes-Men-Spring-Summer-Walking.jpg_640x640.jpg'),
                (6, 'New;Men', 'Spring Sneakers ', 100, 'https://ae01.alicdn.com/kf/HTB1ldy7PFXXXXbgXXXXq6xXFXXX1/2017-font-b-Spring-b-font-Autumn-Fashion-font-b-Shoes-b-font-font-b-Men.jpg'),
                (7, 'New;Men', '2016 Boys Sneakers', 200, 'http://www.colorfulthebox.com/upfiles/main/Boys-Spring-Shoes-Sneakers-2016-Spring-New-Models-Kids-Basketball-Shoes-6534_03.jpg'),
                (8, 'New;Kids', 'Children Fashion ', 350, 'https://ae01.alicdn.com/kf/HTB1s0mxKXXXXXbKXXXXq6xXFXXXM/Fashion-Children-Shoes-2016-Spring-New-High-Zipper-Boys-Girls-Canvas-Shoes-Kids-Sneakers-Casual-Child.jpg'),
                (9, 'New;Kids', ' ', 200, 'https://ae01.alicdn.com/kf/HTB1sAAQJFXXXXb1XFXXq6xXFXXXV/2017-New-Spring-Fashion-Children-Shoes-Canvas-Rubber-Casual-Kids-Shoes-Zip-Blue-Red-Black-Toddler.jpg'),
                (10, 'Women;All', ' ', 300, 'https://dsw.scene7.com/is/image/DSWShoes/415912_819_ss_01?\$pdp-image$'),
                (11, 'Women', ' ', 200, 'https://ae01.alicdn.com/kf/HTB157TwLXXXXXc6XFXXq6xXFXXX0/Women-Shoes-2016-Spring-Autumn-Canvas-Fresh-Solid-Color-Casual-Lady-Shoes-Flats-White-Plus-Size.jpg'),
                (12, 'Women', ' ', 400, 'https://www.dhresource.com/0x0s/f2-albu-g3-M01-BC-D1-rBVaHVXlP3iAFlc-AAgokzTIYGg282.jpg/women-shoes-zapatos-mujer-wedge-sneakers.jpg'),
                (13, 'Women', ' ', 199, 'https://pmcfootwearnews.files.wordpress.com/2016/04/vans-old-skool-digihula-black.jpg?w=1170'),
                (14, 'Women', ' ', 250, 'http://www.onlygreatstyle.com/wp-content/uploads/2016/06/Stradivarius-shoes-spring-summer-2016-for-women-34.jpg'),
                (15, 'Women', ' ', 450, 'https://www.dhresource.com/0x0s/f2-albu-g1-M01-A9-49-rBVaGFbMFN6ADPVMAAKA5ZDRswk189.jpg/new-2016-spring-and-summer-women-flats-canvas.jpg')";
        if (!mysqli_query($conn, $sql))
            die ("Error creating Table: " . mysqli_error($conn));
        else {
            $sql = "CREATE TABLE IF NOT EXISTs users (
                    username varchar(25) NOT NULL PRIMARY KEY,
                    first_name varchar(25) NOT NULL,
                    last_name varchar(25) NOT NULL,
                    email varchar(25) NOT NULL,
                    password varchar(25) NOT NULL
                    )";
            if (!mysqli_query($conn, $sql))
                    die("Error creating Table: ".mysqli_error($conn));
        }
    }
} else
    echo "Error creating database: " . mysqli_error($conn);
mysqli_close($conn);
?>