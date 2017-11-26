-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: pdb18.atspace.me
-- Generation Time: Nov 26, 2017 at 06:08 PM
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2215010_log`
--

-- --------------------------------------------------------

--
-- Table structure for table `ARTICLERATINGS`
--

CREATE TABLE `ARTICLERATINGS` (
  `ARTICLETITLE` varchar(255) NOT NULL,
  `RATING` double NOT NULL,
  `NUMVOTES` int(255) NOT NULL,
  `WHOVOTED` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ARTICLERATINGS`
--

INSERT INTO `ARTICLERATINGS` (`ARTICLETITLE`, `RATING`, `NUMVOTES`, `WHOVOTED`) VALUES
('Vegetable Pasta Salad', 5, 1, 'Jayleen'),
('3D Origami Pieces', 4.66666666667, 6, 'Jayleen , JohnDoe , JaneDoe , KA , adds , robert'),
('Paint a Personalized Card', 5, 1, 'Jayleen'),
('Homemade Sprinkles', 4, 1, 'Madeline'),
('Pumpkin Bread', 3.66666666667, 3, 'Madeline , adds , moby'),
('MangoBerry Smoothie', 5, 1, 'Madeline'),
('Nutella Brownies', 5, 1, 'a'),
('Cookie Monster Cupcakes', 5, 1, 'Texas'),
('Waterproof Your Shoes', 5, 1, 'robert');

-- --------------------------------------------------------

--
-- Table structure for table `ARTICLES`
--

CREATE TABLE `ARTICLES` (
  `ARTICLETITLE` varchar(255) NOT NULL,
  `AUTHOR` varchar(100) NOT NULL,
  `POSTED` varchar(75) NOT NULL,
  `TAG` varchar(25) DEFAULT NULL,
  `SHORTDESC` text NOT NULL,
  `FEATIMGNAME` varchar(75) NOT NULL,
  `YOUTUBELINK` varchar(100) DEFAULT NULL,
  `CONTENT` text NOT NULL,
  `IMGOne` varchar(150) DEFAULT NULL,
  `CapOne` varchar(100) DEFAULT NULL,
  `IMGTwo` varchar(150) DEFAULT NULL,
  `CapTwo` varchar(100) DEFAULT NULL,
  `IMGThree` varchar(150) DEFAULT NULL,
  `CapThree` varchar(100) DEFAULT NULL,
  `IMGFour` varchar(150) DEFAULT NULL,
  `CapFour` varchar(100) DEFAULT NULL,
  `IMGFive` varchar(150) DEFAULT NULL,
  `CapFive` varchar(100) DEFAULT NULL,
  `IMGSix` varchar(150) DEFAULT NULL,
  `CapSix` varchar(100) DEFAULT NULL,
  `IMGSeven` varchar(150) DEFAULT NULL,
  `CapSeven` varchar(100) DEFAULT NULL,
  `IMGEight` varchar(150) DEFAULT NULL,
  `CapEight` varchar(100) DEFAULT NULL,
  `IMGNine` varchar(150) DEFAULT NULL,
  `CapNine` varchar(100) DEFAULT NULL,
  `IMGTen` varchar(150) DEFAULT NULL,
  `CapTen` varchar(100) DEFAULT NULL,
  `INTRO` text,
  `TIME` text NOT NULL,
  `MATERIALS` text NOT NULL,
  `SOURCES` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ARTICLES`
--

INSERT INTO `ARTICLES` (`ARTICLETITLE`, `AUTHOR`, `POSTED`, `TAG`, `SHORTDESC`, `FEATIMGNAME`, `YOUTUBELINK`, `CONTENT`, `IMGOne`, `CapOne`, `IMGTwo`, `CapTwo`, `IMGThree`, `CapThree`, `IMGFour`, `CapFour`, `IMGFive`, `CapFive`, `IMGSix`, `CapSix`, `IMGSeven`, `CapSeven`, `IMGEight`, `CapEight`, `IMGNine`, `CapNine`, `IMGTen`, `CapTen`, `INTRO`, `TIME`, `MATERIALS`, `SOURCES`) VALUES
('Key Lime Pie', 'Zachary', 'Dec 29, 2016 at 9:33 PM', 'food', 'Easy recipe for creating exquisite Key Lime Pie ', 'key-lime-pies-dessert-food.jpg', '', '1. Preheat your oven to 375 degrees Fahrenheit or 190 degrees Celsius.\r\n\r\n2. Combine the beaten egg yolks, sweetened condensed milk and lime juice. Mix them well and pour your mix into the graham cracker crust.\r\n\r\n3. Bake in oven for 15 minutes or until done. Allow to cool.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Key Lime Pie is delicious. The sweet taste and the tart flavor blend together beautifully like bread and butter. I recently tasted some Key Lime Pie in Key West and it was amazing. It was so good that when I returned from vacation I craved more. More of the sweet taste, more of the lime, and more extraordinary pie. But I didn\'t want to travel a thousand miles just for Key Lime Pie. So I decided to make my own. ', 'About 30 minutes', '5 egg yolks, beaten\r\n1/2 cup Key Lime juice\r\n1 9-inch prepared graham cracker crust\r\n1 14 oz. can of sweetened condensed milk', 'Info: http://allrecipes.com/recipe/12698/easy-key-lime-pie-i/?internalSource=similar_recipe_banner&referringId=15880&referringContentType=recipe&clickId=simslot_1\r\n"Key Lime Pie" by Jon Sullivan (http://www.pixnio.com/)\r\n'),
('Nutella Brownies', 'Jayleen', 'Jan 25, 2017 at 3:56 PM', 'food', 'A simple recipe for brownies of everyone\'s favorite spread - Nutella!', 'browniesmini.jpg', '', '1. Preheat oven to 350 degrees Fahrenheit\r\n2. Pour all ingredients into a bowl and stir until the mix is blended well\r\n3. Pour mix into pan or cupcake pan (You chose what you want!)\r\n4. Bake for 20-30 minutes\r\n5. Enjoy!', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'You know those days where you are coming home from school or work and all you want to do it eat something sweet? \r\n\r\nOne of those days happened to me recently and as I stood in the middle of my kitchen I saw that the jar of Nutella sitting on the countertop, away from the vitamins and the iron pills I normally eat everyday. Okay, it wasnâ€™t really just sitting there, it glowed like some sort of holy entity, enough so that I even found myself acting â€œnamasteâ€. But really it was the perfect solution for the sweet tooth I had that day. Except there was one thing the creamy Hazelnut spread lacked - warmth. I really needed the warmth and comfort for the coming days of winter,  so what better choice there be to make some simple Nutella brownies?\r\n\r\nI combined a few of the things left in my fridge, which wasnâ€™t much since I had forgotten to go the grocery store this week. But there is a certain fun of using only  the things you have to make something, donâ€™t you think? \r\n', 'About 45 minutes', '1 cup Nutella, 10 tbsp flour, 2 eggs\r\nOptional: Add anything you want! i.e Almonds, Marshmallows, chocolate chips', 'Source: Marina Kronkin\r\nhttps://www.pinterest.com/pin/539798705307818295/\r\n"Chocolate cupcakes" image from tookapic (/www.pexels.comm) (Public Domain).'),
('3D Origami Pieces', 'Madeline', 'Dec 29, 2016 at 6:59 PM', 'crafts', 'A simple how-to for creating the little building bricks of grand 3D origami sculptures.', 'IMG_2884s.jpg', '', '1.) Divide the piece of printer paper into 32 rectangles. This could be accomplished by folding the paper â€œhamburger styleâ€ 5 times (the last fold is a little difficult). Cut along the folded lines until you have 32 rectangular pieces. \r\n\r\n2.) Take one of the pieces and fold it in half â€œhotdog style.â€\r\n\r\n3.) Without opening it up, fold it in half â€œhamburger style.â€\r\n\r\n4.) Open up the fold. With the folded section facing downward, fold the right side of the paper down along the middle folded line.\r\n\r\n5.) Repeat the previous step to the left side. Your paper should look kind of like a spaceship.\r\n\r\n6.) Flip the paper over. Fold in the bottom right corner.\r\n\r\n7.) Repeat with the bottom left corner.\r\n\r\n8.) Fold up the bottom right flap.\r\n\r\n9.) Repeat with the left flap. It should now look like a triangle.\r\n\r\n10.) Fold the triangle in half along the fold. You are done with your first piece! Repeat the steps until you have a sufficient amount of pieces to make your sculpture.', 'https://i.imgur.com/4qx3ui9.jpg', 'Step 1', 'https://i.imgur.com/wiqnY7C.jpg', 'Step 2', 'https://i.imgur.com/uk6AQCx.jpg', 'Step 3', 'https://i.imgur.com/QOgYCBV.jpg', 'Step 4', 'https://i.imgur.com/aCY6UKu.jpg', 'Step 5', 'https://i.imgur.com/Fzh7CP7.jpg', 'Step 6', 'https://i.imgur.com/UWMHWT6.jpg', 'Step 7', 'https://i.imgur.com/Q7Ab84m.jpg', 'Step 8', 'https://i.imgur.com/NcSyVpm.jpg', 'Step 9', 'https://i.imgur.com/dHgbLM2.jpg', 'Step 10', 'If you have no idea what this is, I suggest you Google \'3D origami\' or \'modular origami\' to see for yourself. It\'s quite something. Anyways, here\'s a quick and easy tutorial to create the individual pieces. ', 'Less than 1 minute for each piece', '-Printer paper (but any other sort of paper will work as long as itâ€™s thin enough. Stay away from construction paper.)\r\n-Scissors or paper cutter (optional, but useful)', ''),
('Paint a Personalized Card', 'Julie', 'Dec 29, 2016 at 7:45 PM', 'crafts', 'Why buy cards when you can make \'em better yourself?', 'card.png', '', '1. Sketch what you want to paint onto the watercolor card using the pencil and eraser. Draw lightly in case you make mistakes, and also so that your line marks arenâ€™t too apparently when you start painting.\r\n\r\n2. Start inking your pencil sketch. Use thicker pens to show shadows and thinner lines for areas in the light. This allows your sketch to have form and depth! Let the ink dry completely, before gently erasing the pencil lines. If you want to keep your piece as a minimalistic contour, you can stop here too! Otherwise, continue with the next step.\r\n\r\n3. Using a larger brush, start blocking in large patches of plain color if you have them. For example here, I will color the bird in solid shades, while putting grays on the lilies as they are white, but still have solid shadows.  Donâ€™t use black (black is the color of death, and will ultimately kill your painting!) but shades of dark blues, greens, and reds combined. \r\n\r\n4. Once youâ€™ve blocked in your basic colors, start adding in more colors and small details. Itâ€™s okay to go out of the lines, since it adds character to your piece! Donâ€™t forget to let your piece dry before adding another layer. \r\n\r\n5. In this stage, you can add extra things like white or gold ink, glitter, ribbon, or whatever to enhance your piece. Donâ€™t forget to add a message within the card!', 'https://i.imgur.com/7jpUALZ.png', 'Materials', 'https://i.imgur.com/me0PrU8.png', 'Step 1', 'https://i.imgur.com/EnOl9UB.png', 'Step 2', 'https://i.imgur.com/wbDP8mC.png', 'Step 3', 'https://i.imgur.com/yeYnXOt.png', 'Step 4', 'https://i.imgur.com/k2w3g7B.png', 'Step 5', '', '', '', '', '', '', '', '', 'I donâ€™t like buying cards, personally. Sure, theyâ€™re pretty and easy to send to people, but they arenâ€™t exactly personalized to the person youâ€™re trying to send the card to. I used to make do with construction paper or computer paper with some colored pencils, but that never looked the most presentable either. Eventually I found out about the existence of watercolor cards, and now I use them whenever I want to send a personal message! People love personalized cards, and this is a way you can send your own special message!', '2-3 hours', '-A blank watercolor card (I use strathmore, personally)\r\n-A pencil and eraser\r\n-At least one watercolor brush\r\n-Watercolor paint\r\n-A watercolor palette\r\n-A bowl/cup of clean water\r\n-Inking pens', ''),
('Vegetable Pasta Salad', 'Andrea', 'Dec 28, 2016 at 6:15 PM', 'food', 'This has been our favorite family recipe and it is a perfect way to get your greens into your diet and satisfy. So if you are in a need for a vegetarian recipe this is definitely it.', 'salad.png', 'https://www.youtube.com/embed/WhflKu4xwLU', '1. Pour six tablespoons of apple cider vinegar and three tablespoons of olive oil into bowl\r\n2. Add a splash of liquid aminos\r\n3. Add salt and pepper into liquid\r\n4. Peel and cut two cucumbers and pour into bowl\r\n5. Thinly cut three tomatoes and pour into bowl\r\n6. Cut two sets of green onions and pour into bowl\r\n7. Chop five garlic cloves and cut basil leaves, then pour into bowl\r\n8. Put water on stove to boil and once water is boiling, pour two cups of vegetable pasta into pan\r\n9. Once done cooking, pour pasta into bowl\r\n10. Add feta cheese into bowl\r\n11. Stir until pleased with consistency\r\n12. Enjoy!', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '45 minutes', 'Braggâ€™s apple cider vinegar\r\nBraggâ€™s liquid aminos\r\nOlive oil\r\nSalt and pepper\r\n2 organic cucumbers\r\n3 organic tomatoes\r\nBasil leaves\r\n2 organic green onion stalks\r\nGarlic cloves\r\nBarilla vegetable pasta\r\nMediterranean feta cheese', ''),
('Homemade Sprinkles', 'Jayleen', 'Dec 29, 2016 at 4:57 PM', 'food', 'Who needs store bought when you can make your own colors?', 'sprinklesmini.jpg', '', '1. Combine the confectionerâ€™s sugar, egg white, salt and vanilla extract together in a bowl\r\n2. Mix until texture is like glue \r\n3. Put your color (letâ€™s get those rainbows going!) and mix again until the desired color is achieved\r\n4. Scrape the paste into pastry bags (or you can use a ziploc bag with the edge cut off) \r\n5. Squeeze the pastry bag (or ziploc bag) onto a non-stick tray and make lines with the paste.\r\n6. Wait until the lines are dry, and then break the dried lines into pieces and place into a container\r\n7. Viola! You now have homemade sprinkles!', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Itâ€™s really hard to hate sprinkles. Those bright little pieces of sugar on ice cream or cakes always gets me excited. \r\n\r\nI bought cupcakes for my younger sister\'s birthday, vanilla ones with white icing and sprinkles. And of course, I had to eat one too(well deserved for mothers), but I was taken back when I tasted the sprinkles. They tasted so waxy to me, and not like the sprinkles that I loved - the bright little sugar topping, melting in your mouth. \r\n\r\nI had to fix this.\r\n\r\nSo here it is, my recipe for homemade sprinkles, party inspired by my sister, though I do regret letting her hand those cupcakes with the overly process sprinkles to her Kindergarten class. Inspiration comes from the strangest of things. ', 'About 30 minutes', '6 ounces sifted confectioner\'s sugar\r\n1 egg white, at room temperature\r\n3/4 teaspoon pure vanilla extract \r\n1/4 teaspoon salt\r\nAny food coloring that you desire!', 'Source: Michelle \r\nhttps://food52.com/blog/9658-how-to-make-your-own-sprinkles\r\n"Sprinkles" image from Ramdlon (pixabay.com) (Public Domain).'),
('Edit Eye Color: Photoshop', 'Madeline', 'Dec 29, 2016 at 6:50 PM', 'technology', 'Ever wanted bright, [insert color here] eyes but too lazy to buy contacts? Well, wish no more! That is easily accomplished with the magic of Photoshop. ', 'studio-660804_1280e.jpg', '', '1. Select the â€˜Quick Selection Toolâ€™. If you still canâ€™t find it, find the â€˜Magic Wand Toolâ€™ and hold it down. An option for the â€˜Quick Selection Toolâ€™ should pop up. \r\n\r\n2. Make sure the â€˜Add to selectionâ€™ option is chosen. \r\n\r\n3. Start selecting the iris and the pupils of the eye. You know if something is selected if itâ€™s surrounded by moving black-and-white dashed lines. If you selected something outside what you want to select, click on the â€˜Subtract from selectionâ€™ option and it will start removing what you select. You can change the size of your selection brush if necessary. \r\n\r\n4. For those with dark brown eyes, it is sometimes difficult for the â€˜Quick Selection Toolâ€™ to select based off of colors. If youâ€™re having trouble, itâ€™s better to use the â€˜Polygonal Lasso Toolâ€™. If you canâ€™t find it, find the Lasso Toolâ€™ or the â€˜Magnetic Lasso Toolâ€™ and hold it down. An option for the â€˜â€˜Polygonal Lasso Toolâ€™ will pop up. Using the â€˜â€˜Polygonal Lasso Toolâ€™, start outlining the iris, clicking in small increments. To start on the other eye, finish the selection and hold down shift before clicking.\r\n\r\n5. Once you have your eyes selected, go to â€˜Imageâ€™ > â€˜Adjustmentsâ€™ > â€˜Hue/Saturationâ€™. Use the slider to change the hues (colors). To make the color brighter, increase the saturation. DONâ€™T change the lightness. Click â€˜OKâ€™ once finished.\r\n\r\n6. If you want to make your eyes lighter/darker, go to â€˜Imageâ€™ > â€˜Adjustmentsâ€™ > â€˜Brightness/Contrastâ€™. Lower the contrast all the way down and increase the brightness a little to make them lighter, and vice versa to make it darker. Click â€˜OKâ€™ once finished.', 'https://i.imgur.com/9jCKOUI.png', 'Original image', 'https://i.imgur.com/1GAXVTE.png', 'The tools', 'https://i.imgur.com/85kM3cJ.png', 'Using \'Quick Selection Tool\'', 'https://i.imgur.com/32d5tLi.png', 'Using \'Polygonal Lasso Tool\'', 'https://i.imgur.com/wOjTrOe.png', 'Use \'Hue/Saturation\' to change colors and intensity', 'https://i.imgur.com/0I72788.png', '', 'https://i.imgur.com/eOzzqVW.png', 'Use \'Brightness/Contrast\' to change lightness/darkness', 'https://i.imgur.com/MEBus5H.png', '', 'https://i.imgur.com/Ie63Ews.png', 'Final image', '', '', '', '5 minutes', '-Photoshop', 'Photo by 821764 (pixabay.com)'),
('Add Photoshop Textures', 'Madeline', 'Dec 28, 2016 at 11:41 AM', 'technology', 'How to make your pictures look 1000000x times cooler with textures. Difficulty level: Easy', 'plant-1368187_1280.png', '', '1. Make sure your original image has colors. Open your original image in Photoshop. Create a new layer and open your texture image. (You can easily find so many textures by Googling â€˜Photoshop textures.â€™ Make sure you have the rights to use them.)\r\n\r\n2. Resize your texture image if necessary. Ctrl+T is the shortcut. Make sure your texture image completely covers your original image.\r\n\r\n3. Next, youâ€™re going to have to access your Layers Window. This could be found, if not already opened, by clicking on your â€˜Windowâ€™ tab (should be between â€˜Viewâ€™ and â€˜Helpâ€™) and going down and clicking â€˜Layersâ€™ (or use the shortcut F7).\r\n\r\n4. Now that your Layers Window is open, select the layer of your texture image. \r\n\r\n5. Above, there is a box that says â€˜Normalâ€™ (located right beside â€˜Opacityâ€™). Click that and select â€˜Overlay.â€™\r\n\r\n6. Your image should look different (the degree of how different it looks depends on your texture and original image). You can tweak it by changing the opacity of the texture, duplicating the overlayed texture image, or adding in more textures to your image. Have fun! ', 'https://i.imgur.com/bWAJNwF.png', 'Original image', 'https://i.imgur.com/8TkwSQI.png', 'Open up the Layers Window', 'https://i.imgur.com/d7l5EzC.png', 'Select \'Overlay\' on the texture layer', 'http://i.imgur.com/5jihbFk.png', 'Final image after 2 textures', '', '', '', '', '', '', '', '', '', '', '', '', '', 'A couple minutes', '-Photoshop\r\n-Original image\r\n-Texture image', 'Original image: esiul (pixabay.com)\r\nTexture images: Sirius-sdz (deviantart.com)'),
('Origami Lucky Hearts', 'Madeline', 'Dec 28, 2016 at 8:55 PM', 'crafts', 'These cute little puffed-up hearts are great for any occasion and setting.', 'IMG_2948.JPG', '', '1. Start off by cutting your paper into strips. Almost any dimension can work, as long as it is long and rectangular. The strips I use are around 1 in x 5.6 in.\r\n\r\n2. Fold a triangle at the end of the strip, lining up the edges. Repeat this by continuing to fold triangles across the edges until you can no longer fold anymore triangles.\r\n\r\n3. The remaining bit of paper should be rectangular. Fold in the corner at the end of the rectangle closest to the 45 degree corner of the triangle. \r\n\r\n4. Tuck the remaining bit into the slit created by the previous folds. You should be left with a pretty decent looking 90 degree triangle.\r\n\r\n5. Using scissors, cut off a bit of both 45 degree corners, rounding them.\r\n\r\n6. This step requires a bit of muscle. Hold the triangle with both hands with the hypotenuse facing downwards and resting against both thumbs and place the index fingers of both hands on the remaining sides of the triangle. Push into the hypotenuse with your thumbs, creating a dent and puffing the triangle outwards. The triangle should resemble more closely to a heart.\r\n\r\n7. Finish the heart off by gently pinching what used to be the 45 degree corners so that only the middle of the heart is puffed, leaving the tops to taper off in volume.', 'https://i.imgur.com/EW9epXY.jpg', '1 in x 5.6 in paper strips', 'https://i.imgur.com/A9sBG5m.jpg', 'Start by folding a triangle at the end', 'https://i.imgur.com/vtRH952.jpg', 'Continue folding triangles all the way through the paper strip', 'https://i.imgur.com/48292nQ.jpg', 'With the remaining bit of paper, fold in the corner', 'https://i.imgur.com/NOd1gCG.jpg', 'Tuck the remaining bit of paper into the slit to form a right triangle', 'https://i.imgur.com/r19wEv6.jpg', 'Round off the corners', 'https://i.imgur.com/EiOTZ4u.jpg', 'Using your thumbs, push a dent into the hypotenuse', 'https://i.imgur.com/O4bUse8.jpg', 'Gently pinch the tops', '', '', '', '', 'I wouldn\'t consider lucky hearts to be true origami, but it is quite pretty to look at and fun to make. The name is based off of its distant cousin, lucky stars, puffy 3D stars which have a long history but their true cultural origins lost through time. ', 'Less than a minute for each heart', '- Paper\r\n- Scissors\r\n- Paper cutter (optional)', ''),
('Curve Tool (Illustrator)', 'Julie', 'Dec 29, 2016 at 7:50 PM', 'technology', 'The curve tool: one of the most useful tools in Adobe Illustrator. ', 'curva.PNG', '', '1. Provide a sketch of what you want to use in Illustrator. This can be done on paper and scanned/taken a picture of, or you can use a digital drawing program like Photoshop.\r\n\r\n2. Open up Adobe Illustrator and start a new canvas.\r\n\r\n3. Click File, then Open, and now add in your sketch.\r\n\r\n4. Lock the sketch in Layer 1 and add a new layer.\r\n\r\n5. Select the Curvature Tool (Shift + ~).\r\n\r\n6. Place one anchor point on an end of a line. This establishes the starting point of the curve you want to make.\r\n\r\n7. Place another point and move your arrow. You will notice a preview of the curve. As you add points, it will curve and adjust the line.\r\n\r\n8. Continue adding points until you finish your curve.\r\n\r\n9. Click on the Width Tool (Shift +W).\r\n\r\n10. When you grab at points on your line, you can adjust the thickness and thinness of your line and certain points.\r\n\r\n11. Continue doing this for the rest of your sketch, until your line art is entirely finished.\r\n\r\n12. Delete Layer 1.\r\n\r\n13. Save the image as a jpg and youâ€™re done.\r\n\r\n', 'https://i.imgur.com/IhynLxv.png', 'Step 1', 'https://i.imgur.com/qnoovfy.png', 'Step 4', 'https://i.imgur.com/1OC8xAE.png', 'Step 5', 'https://i.imgur.com/syGjmBt.png', 'Step 7', 'https://i.imgur.com/9AKImBH.png', 'Step 8', 'https://i.imgur.com/Kfxke6m.png', 'Step 9', 'https://i.imgur.com/uosT9Tg.png', 'Step 10', 'https://i.imgur.com/iTHyALE.png', 'Step 11', 'https://i.imgur.com/EMtCgII.png', 'Step 12', 'https://i.imgur.com/O9UWtR5.png', 'Step 13', 'Despite how wonderful Photoshop is, one thing I despise about it is how I can never get my lines in Photoshop to be smooth and continuous. As youâ€™re the one directing the lines, line art can come out to be wobbly and imprecise, or sketchy and rough. Illustrator on the other hand makes smooth, crisp lines. As it uses vectors, the program adjusts your lines accordingly and will never turn out pixelated either! Itâ€™s a wonderful program, and hereâ€™s how to make nice line art.', 'Depends on how elaborate your sketch is. The one shown below will take 15 minutes.', '- A sketch\r\n- Adobe Illustrator\r\n- A tablet for drawing (if you have one. Refer to next bullet point if you donâ€™t)\r\n- A mouse and a lot of patience', ''),
('Pumpkin Bread', 'Andrea', 'Mar 4, 2017 at 9:33 AM', 'food', 'Fall will soon be knocking at our door. Whether it is in lattes, cookies or pies, pumpkin is a hallmark flavor of the fall season. Yields: 4 loaves ', 'bread.PNG', '', '1. Preheat oven to 350 degrees \r\n\r\n2. Grease bottoms of 4 loaf pans, 8 Â½ x 4 Â½ x 2 Â½ in with oil/butter\r\n\r\n3. Stir together pumpkin, sugars, oil/butter, vanilla and eggs in a large bowl\r\n\r\n4. Stir in remaining ingredients\r\n\r\n5. Pour mixture into pans\r\n\r\n6. Bake 45-60 minutes or until toothpick inserted in the center comes out clean \r\n\r\n7. Cool 10 minutes\r\n\r\n8. Loosen sides of loaves from pans: remove from pans and place top side up on a wire rack. Cool completely before slicing.\r\n\r\n9. Wrap tightly and store at room temperature up to 4 days, or refrigerate up to 10 days', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'One of my favorite ways to kick off the fall time is with pumpkin bread. So gather the family and stir the ingredients, pour the batter, and bake these loaves to perfection, and to my surprise, itâ€™s actually quite easy. \r\nThis recipe isnâ€™t limited to just the fall time, either. Swap out the pumpkin for bananas, carrots, chocolate or nuts and youâ€™ve got yourself a whole new flavor of the same familiar bread.', 'Prep time: 20 minutes \r\nCook time: 1 hour\r\nTotal time: 1 hour 20 minutes', '1 can (15 oz) pumpkin\r\n1 cup sugar (white)\r\n1 cup brown sugar (required)\r\n1 cup oil or softened butter \r\n2 teaspoon vanilla\r\n4 eggs \r\n2 Â¼ cup flour\r\n2 teaspoon baking soda\r\n2 teaspoon baking powder\r\n1 teaspoon salt\r\n1 teaspoon ground cinnamon\r\nÂ½ teaspoon ground cloves\r\n1 teaspoon ginger juice', ''),
('MangoBerry Smoothie', 'Andrea', 'Jan 3, 2017 at 9:11 PM', 'food', 'This smoothie can be for those who do sports in the morning, a lighter alternative to a solid meal before an early morning workout. For everyone else, yogurt and extra ingredients added can provide protein for early activities.', 'smoothie.PNG', '', '1. Blend all ingredients in a blender until they reach a smooth consistency. \r\n\r\n2. Pour into a to-go cup and enjoy.        ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5 minutes', '1 cup Kefir probiotic drink (similar to liquid yogurt) or greek yogurt \r\nâ…“ cup halved strawberries\r\nâ…“ cup sliced mango\r\nÂ¾ cup ice\r\nOptional toppings (ex: granola, peanut butter, coconut, dried fruit, nuts, banana slices, etc.)        ', ''),
('Separate the Condiments', 'Andrea', 'Jan 3, 2017 at 2:43 PM', 'other', 'Life Hack: Having a BBQ? Well use a muffin tin to serve condiments at the grill out. It helps cut the dish washing.', 'fillercondiments.jpg', '', '1. Pour each condiment in the muffin tin, nice and easy.\r\n\r\n2. Enjoy!', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5 minutes', 'Condiments \r\nMuffin tin\r\nSpoons', 'Hot Dog Image by Meditations (pixabay.com)'),
('Slime Recipe', 'Zachary', 'Dec 30, 2016 at 6:55 PM', 'other', 'How to make gooey slime with a few household materials.', 'FullSizeRender.jpg', '', 'Step 1: Mix 1 tablespoon of borax with one cup of water. Stir it so the borax dissolves completely.\r\n\r\nStep 2: In the large mixing bowl, add as much clear glue as youâ€™d like. Leave enough room in the bowl to add the borax solution.\r\n\r\nStep 3: Add water to the mixing bowl with the white glue. Use the same amount of water as glue. \r\nTip: Use your bottle of glue (if you used a bottle) to measure. Fill it with water and pour the water in. \r\n\r\nStep 4: Wash your hands first and then use your hands to mix the water and the glue solution in the bowl.\r\n\r\nStep 5 (optional): If you want colored slime, nowâ€™s the time to add a few drops of food coloring. Not to many because a few go a long way. Mix together until the color is even throughout the mixture.\r\n\r\nStep 6: Add just a little bit of the borax solution at a time and keep mixing as you do. Adding the borax gradually gives you the consistency of slime you want. It may take several additions to get that consistency.\r\n\r\nStep 7: Keep kneading the goo until it has a smooth consistency. It should start sticking together like bread dough. When you get the consistency you want, take it out of the bowl and play with it. If you used food coloring, be careful not to go get any on the carpet - it will stain fabrics.\r\n\r\nStep 8: When youâ€™re done playing as much as you want with your slime, just bag it up and throw it away in the trash. Luckily, youâ€™ve got lots of Borax left to make it again and again, too!\r\n\r\n \r\n\r\n\r\n\r\n\r\n\r\n', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10-20 min.', 'Borax\r\nWater\r\nClear Glue (as much as you\'re like)\r\nLarge Mixing Bowl\r\nSpoon\r\nMeasuring Cups\r\nZiploc Bag\r\nFood Coloring (optional)', 'Source: https://www.stevespanglerscience.com/lab/experiments/glue-borax-gak/'),
('Cookie Monster Cupcakes', 'Andrea', 'Mar 4, 2017 at 8:15 AM', 'food', 'Need to do something quick and neat for a birthday party or etc. We have the perfect recipe to satisfy, a â€œcookie monsterâ€ dessert, will satisfy your sweet tooth at any party or event. ', 'cookie.png', 'https://www.youtube.com/embed/ttps://www.youtube.com/embed/ttps://www.youtube.com/embed/Inf6zXUijK8 ', '1. First, preheat oven to 350 degrees. Line cookie trays with baking parchment paper.\r\n\r\n2. Place the cookie dough two inches apart on greased tray.\r\n\r\n3. Bake the cookies for 12 to 13 minutes, or until golden brown.\r\n\r\n4. Grab a toothpick and stab the cookie, if the toothpick still has some cookie dough residue then it isnâ€™t finished. Repeat baking if that\'s the case\r\n\r\n5. If finished, let it cool for about 15 to 20 minutes. \r\n\r\n6. Put cookies into pairs, matching them by size. For each pair, take chocolate icing and spread it over one of the cookies. Then, place the other cookie on top. \r\n\r\n7. Cut 10 marshmallows in half and place three pieces in between each cookie on the icing part as â€œteethâ€.\r\n\r\n8. Next, spoon a small dollop of the chocolate icing on top of the cookie, and place two candy eyes on the icing.\r\n\r\n9. Enjoy! ', 'https://i.imgur.com/1tkr0hM.png', 'Place the cookie dough two inches apart on greased tray.', 'https://i.imgur.com/w8Muj5g.png', 'Bake the cookies for 12 to 13 minutes.', 'https://i.imgur.com/CnMJbvQ.png', ' The cookies should look golden brown.', 'https://i.imgur.com/6vXsqaT.png', ' Take chocolate icing and spread it over one of the cookies.', 'https://i.imgur.com/DXLatG9.png', ' Cut the marshmallows in half.', 'https://i.imgur.com/RE4FXVj.png', ' The marshmallows will become "teeth."', 'https://i.imgur.com/9sjjyQs.png', ' Spoon a small dollop of the chocolate icing on top of the cookie.', ' https://i.imgur.com/8ePrQUB.png', ' Place two candy eyes on the icing.', '', '', '', '', '', '1 hour', '- Nestle Toll House cookie dough, 16 oz. or you can make your own cookies\r\n- Chocolate icing, 16 oz. \r\n- Mini marshmallows, 16 oz.\r\n- Wilton candy eyeballs', ''),
('Waterproof Your Shoes', 'Andrea', 'Jan 30, 2017 at 6:02 PM', 'other', 'Life Hack: Feel the need to waterproof your shoes? I often walk home from school and if the forecast calls for rain my shoes will turn into a swamp. Here is a quick solution.', 'fillershoes.jpg', 'https://www.youtube.com/embed/J_LR4fvMdxM', '1. Apply a soft layer of beeswax in blanks areas of each shoe.\r\n\r\n2. Blow dry the areas applied with beeswax \r\n\r\n3. Let them cool for 5 min', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5-10 minutes', 'Beeswax 4oz\r\nBlow drier\r\nShoes, whatever pair', 'Image by Snufkin (pixabay.com)'),
('De-stemming Strawberries', 'Andrea', 'Jan 30, 2017 at 5:57 PM', 'other', 'Life Hack: I love eating strawberries but I feel like Iâ€™m wasting a lot of it trying to get the stem out. I stumbled upon a solution on the internet, and itâ€™s effortless.', 'fillerstrawberry.jpg', 'https://www.youtube.com/embed/hEaCMlgHXwA', '1. Place the straw at the tip of the strawberry.\r\n\r\n2. Line the straw perfectly to the stem.\r\n\r\n3. Stab through and the stem is finally removed.', 'https://i.imgur.com/tviWIV4.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5-10 seconds per strawberry', 'One straw \r\nStrawberries', 'Image by natic_ua (pixabay.com)');

-- --------------------------------------------------------

--
-- Table structure for table `COMMENTS`
--

CREATE TABLE `COMMENTS` (
  `COMMENTBYUSER` varchar(50) DEFAULT NULL,
  `ARTICLETITLE` varchar(50) DEFAULT NULL,
  `DATEPOSTED` varchar(50) DEFAULT NULL,
  `CONTENT` varchar(350) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `COMMENTS`
--

INSERT INTO `COMMENTS` (`COMMENTBYUSER`, `ARTICLETITLE`, `DATEPOSTED`, `CONTENT`) VALUES
('Jayleen', 'Paint a Personalized Card', 'Dec  24, 2016 at 8:08 PM', 'I really like that bird painting, looks nice!'),
('Jayleen', '3D Origami Pieces', 'Dec  24, 2016 at 8:09 PM', 'Looks good!'),
('Madeline', 'Paint a Personalized Card', 'Dec  24, 2016 at 10:57 PM', 'I agree. Good job Julie!'),
('Blake', '3D Origami Pieces', 'Jan  3, 2017 at 11:01 PM', 'I love origami!'),
('Jayleen', 'Waterproof Your Shoes', 'Jan  17, 2017 at 3:27 PM CST', 'Looks cool!'),
('SamAcc', 'Key Lime Pie', 'Jan  3, 2017 at 11:25 AM', 'Looks good!'),
('Julie', 'Cookie Monster Cupcakes', 'Jan  2, 2017 at 10:53 PM', 'omg brings back childhood memories'),
('Julie', 'MangoBerry Smoothie', 'Jan  2, 2017 at 10:52 PM', 'would love this for summer'),
('Julie', 'Vegetable Pasta Salad', 'Jan  2, 2017 at 10:52 PM', 'looks delicious!'),
('Julie', 'Key Lime Pie', 'Dec  30, 2016 at 2:34 PM', 'looks delicious'),
('Julie', 'Pumpkin Bread', 'Dec  30, 2016 at 2:34 PM', 'great for the holidays'),
('Julie', 'Waterproof Your Shoes', 'Dec  30, 2016 at 2:39 PM', 'wow I never thought of this! Definitely going to do this to prepare for the rainy season :)'),
('Julie', 'Add Photoshop Textures', 'Dec  30, 2016 at 2:40 PM', 'wow its so easy yet so cool!'),
('Julie', 'Edit Eye Color: Photoshop', 'Dec  30, 2016 at 2:41 PM', 'wow this is a really great tutorial! thnx :)'),
('Julie', 'Separate the Condiments', 'Dec  30, 2016 at 2:42 PM', 'wow i gotta do this sometime'),
('Julie', 'Nutella Brownies', 'Jan  2, 2017 at 10:52 PM', 'looks delicious'),
('Julie', 'Origami Lucky Hearts', 'Jan  2, 2017 at 10:51 PM', 'perfect for valentines day!'),
('Jayleen', 'Origami Lucky Hearts', 'Dec  30, 2016 at 5:57 PM', 'Looks nice!'),
('Jayleen', 'Edit Eye Color: Photoshop', 'Jan  19, 2017 at 8:27 PM', 'Wow!'),
('Texas', 'Cookie Monster Cupcakes', 'Mar  4, 2017 at 9:31 AM', 'So cool!0'),
('Madeline', 'Pumpkin Bread', 'Jan  29, 2017 at 4:06 PM', 'Looks delicious!! I must try this someday.'),
('adds', 'Pumpkin Bread', 'Mar  3, 2017 at 10:35 PM', 'yo\n'),
('adds', '3D Origami Pieces', 'Mar  3, 2017 at 10:37 PM', 'So simple!'),
('Jayleen', 'Key Lime Pie', 'Mar  3, 2017 at 10:37 PM', 'Wow!'),
('robert', '3D Origami Pieces', 'Mar  3, 2017 at 10:44 PM', 'I found another method!! check my profile..\n'),
('serverbedi', 'Separate the Condiments', 'Nov  9, 2017 at 09:13', 'dfgdfgdfgdfg');

-- --------------------------------------------------------

--
-- Table structure for table `IMAGETEST`
--

CREATE TABLE `IMAGETEST` (
  `IMG` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `USERFAVORITES`
--

CREATE TABLE `USERFAVORITES` (
  `USERNAME` varchar(100) NOT NULL,
  `FAVEDARTICLE` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USERFAVORITES`
--

INSERT INTO `USERFAVORITES` (`USERNAME`, `FAVEDARTICLE`) VALUES
('Jayleen', 'Paint a Personalized Card'),
('Jayleen', '3D Origami Pieces'),
('Jayleen', 'MangoBerry Smoothie'),
('Jayleen', 'Edit Eye Color: Photoshop'),
('Jayleen', 'Add Photoshop Textures'),
('Jayleen', 'Origami Lucky Hearts'),
('Madeline', 'Cookie Monster Cupcakes'),
('Madeline', 'MangoBerry Smoothie'),
('Madeline', 'Pumpkin Bread'),
('KA', '3D Origami Pieces'),
('a', 'Nutella Brownies'),
('Texas', 'Cookie Monster Cupcakes'),
('adds', 'Pumpkin Bread'),
('adds', '3D Origami Pieces'),
('robert', '3D Origami Pieces');

-- --------------------------------------------------------

--
-- Table structure for table `USERLIST`
--

CREATE TABLE `USERLIST` (
  `FIRSTNAME` varchar(25) DEFAULT NULL,
  `LASTNAME` varchar(25) DEFAULT NULL,
  `EMAIL` text,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASS` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USERLIST`
--

INSERT INTO `USERLIST` (`FIRSTNAME`, `LASTNAME`, `EMAIL`, `USERNAME`, `PASS`) VALUES
('John', 'Doe', 'johndoe@example.com', 'JohnDoe', 'john'),
('Jane', 'Doe', 'Janedoe@example.com', 'JaneDoe', 'jane'),
('Ma', 'H', 'sdf', '1', 'd'),
('M', 'H', 'd', 'styx', 'styx'),
('Manasi', 'Ramadurgum', 'mxr4893@g.coppellisd.com', 'mxr4893', 'kitties'),
('M', 'H', 'M', 'Styx', 'styx'),
('Zachary', 'L.', 'coppellisd@example.com', 'Terrablader11', '123456789'),
('Albert', 'Li', 'qimingl@hotmail.com', 'albertli', 'albertli'),
('Jayleen', 'L', 'jpl0132@g.coppellisd.com', 'Jayleen', 'jayleen'),
('Jamie', 'Brown', 'Jbrown@hotmail.com', 'Jbrown', 'jbrown'),
('', '', '', '', ''),
('Madeline', 'Huang', 'M', 'Madeline', 'Huang'),
('Julie', 'Choi', 'J', 'Julie', 'Choi'),
('k', 'k', 'k', 'k', 'k'),
('Zachary', 'Li', 'zcl1578@gmail.com', 'Zachary', 'Zachary'),
('Andrea', 'Arce', 'A', 'Andrea', 'Arce'),
('Meow', 'Meow', 'meow', 'meow', 'meow'),
('SampleAccount', 'Sample', 'sampleacc@gmail.com', 'SampleAccount', 'sample'),
('Sample', 'Account', 'sampleaccount@gmail.com', 'SamAcc', 'sample'),
('Blake', 'Johnson', 'blakeJohn@gmail.com', 'Blake', 'johnson'),
('John', 'Smith', 'johnsmith@example.com', 'John', 'Smith'),
('doctor', 'feelbetter', 'andrea.a@verizon.net', 'adds', 'ihavenoclue'),
('Grace', 'Turman', 'turmangrace@hotmail.com', 'grace.t', 'turmangrace'),
('M', 'M', 'M', 'MA', 'MA'),
('MA', 'MA', 'MA', 'KA', 'KA'),
('ADF', 'ADF', 'ADf', 'a', 'a'),
('Texas', 'Texas', 'Texas@email.com', 'Texas', 'Texas'),
('Robert', 'ads', 'ad', 'robert', 'abc'),
('Ma Lourdes', 'Suello', 'lourdessuello@outlook.com', 'lourdesyang', 'esyang23'),
('ukkikfx', 'ukkikfx', 'exwyxo@gbphln.com', 'ukkikfx', ''),
('yohfmgrrw', 'yohfmgrrw', 'asnjjn@ipruly.com', 'yohfmgrrw', ''),
('lmrbynq', 'lmrbynq', 'dsymta@fmypfq.com', 'lmrbynq', ''),
('asfafs', 'saafsasf', 'asfasf@wp.pl', 'tetetea', 'marcin12'),
('Mogbolahan', 'Ojeyinka', 'mogbolahan@gmail.com', 'moby', 'moby001'),
('serverbedi', 'server', 'siyahmakalem@gmail.com', 'serverbedi', 'edirnekesan22');

-- --------------------------------------------------------

--
-- Table structure for table `USERNOTIFICATIONS`
--

CREATE TABLE `USERNOTIFICATIONS` (
  `FORUSER` varchar(100) NOT NULL,
  `FROMUSER` varchar(100) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `NOTIFICATION` varchar(200) NOT NULL,
  `REDIRECTLINK` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USERNOTIFICATIONS`
--

INSERT INTO `USERNOTIFICATIONS` (`FORUSER`, `FROMUSER`, `DATE`, `NOTIFICATION`, `REDIRECTLINK`) VALUES
('Jayleen', 'a', 'Mar  2, 2017 at 10:15 PM', 'a commented on your article: Wow!', 'http://ideablr.com/diypage.php?article=Nutella Brownies'),
('Madeline', 'KA', 'Mar  2, 2017 at 10:04 PM', 'KA commented on your article: Amazing!', 'http://ideablr.com/diypage.php?article=3D Origami Pieces'),
('Andrea', 'adds', 'Mar  3, 2017 at 10:52 PM', 'adds commented on your article: Amazing!', 'http://ideablr.com/diypage.php?article=Cookie Monster Cupcakes'),
('Madeline', 'Jayleen', 'Jan  26, 2017 at 3:34 PM CST', 'Jayleen favorited on your article "Origami Lucky Hearts"!', 'http://ideablr.com/diypage.php?article=Origami Lucky Hearts'),
('Andrea', 'Madeline', 'Feb  1, 2017 at 11:03 AM', 'Madeline favorited on your article "Pumpkin Bread"!', 'http://ideablr.com/diypage.php?article=Pumpkin Bread'),
('Madeline', 'KA', 'Mar  2, 2017 at 10:06 PM', 'KA favorited on your article "3D Origami Pieces"!', 'http://ideablr.com/diypage.php?article=3D Origami Pieces'),
('Andrea', 'Madeline', 'Jan  29, 2017 at 4:06 PM', 'Madeline commented on your article: Looks delicious!! I must try this someday.', 'http://ideablr.com/diypage.php?article=Pumpkin Bread'),
('Andrea', 'Madeline', 'Jan  30, 2017 at â€Ž6â€Ž:â€Ž03â€Ž7â€Ž â€ŽPM', 'Madeline favorited on your article "Cookie Monster Cupcakes"!', 'http://ideablr.com/diypage.php?article=Cookie Monster Cupcakes'),
('Andrea', 'Madeline', 'Jan  30, 2017 at â€Ž6â€Ž:â€Ž03â€Ž0â€Ž â€ŽPM', 'Madeline favorited on your article "Cookie Monster Cupcakes"!', 'http://ideablr.com/diypage.php?article=Cookie Monster Cupcakes'),
('Andrea', 'Madeline', 'Jan  30, 2017 at â€Ž6â€Ž:â€Ž03â€Ž6â€Ž â€ŽPM', 'Madeline favorited on your article "Cookie Monster Cupcakes"!', 'http://ideablr.com/diypage.php?article=Cookie Monster Cupcakes'),
('Andrea', 'Madeline', 'Jan  30, 2017 at â€Ž6â€Ž:â€Ž04â€Ž7â€Ž â€ŽPM', 'Madeline favorited on your article "MangoBerry Smoothie"!', 'http://ideablr.com/diypage.php?article=MangoBerry Smoothie'),
('Jayleen', 'a', 'Mar  2, 2017 at 10:15 PM', 'a favorited on your article "Nutella Brownies"!', 'http://ideablr.com/diypage.php?article=Nutella Brownies'),
('Andrea', 'BPA', 'Mar  3, 2017 at 10:10 AM', 'BPA commented on your article: Wow!', 'http://ideablr.com/diypage.php?article=Cookie Monster Cupcakes'),
('Andrea', 'BPA', 'Mar  3, 2017 at 10:10 AM', 'BPA favorited on your article "Cookie Monster Cupcakes"!', 'http://ideablr.com/diypage.php?article=Cookie Monster Cupcakes'),
('Andrea', 'Andrea', 'Mar  3, 2017 at 10:12 AM', 'Andrea commented on your profile: Hello!', 'http://ideablr.com/profile.php?user=Andrea'),
('Andrea', 'adds', 'Mar  3, 2017 at 10:35 PM', 'adds favorited on your article "Pumpkin Bread"!', 'http://ideablr.com/diypage.php?article=Pumpkin Bread'),
('Andrea', 'adds', 'Mar  3, 2017 at 10:35 PM', 'adds commented on your article: yo\n', 'http://ideablr.com/diypage.php?article=Pumpkin Bread'),
('Madeline', 'adds', 'Mar  3, 2017 at 10:37 PM', 'adds favorited on your article "3D Origami Pieces"!', 'http://ideablr.com/diypage.php?article=3D Origami Pieces'),
('Madeline', 'adds', 'Mar  3, 2017 at 10:37 PM', 'adds commented on your article: So simple!', 'http://ideablr.com/diypage.php?article=3D Origami Pieces'),
('Zachary', 'Jayleen', 'Mar  3, 2017 at 10:37 PM', 'Jayleen commented on your article: Wow!', 'http://ideablr.com/diypage.php?article=Key Lime Pie'),
('Madeline', 'robert', 'Mar  3, 2017 at 10:44 PM', 'robert favorited on your article "3D Origami Pieces"!', 'http://ideablr.com/diypage.php?article=3D Origami Pieces'),
('Madeline', 'robert', 'Mar  3, 2017 at 10:44 PM', 'robert commented on your article: I found another method!! check my profile..\n', 'http://ideablr.com/diypage.php?article=3D Origami Pieces'),
('Andrea', 'Texas', 'Mar  4, 2017 at 9:31 AM', 'Texas favorited on your article "Cookie Monster Cupcakes"!', 'http://ideablr.com/diypage.php?article=Cookie Monster Cupcakes'),
('Andrea', 'Texas', 'Mar  4, 2017 at 9:31 AM', 'Texas commented on your article: So cool!0', 'http://ideablr.com/diypage.php?article=Cookie Monster Cupcakes'),
('Julie', 'moby', 'Oct  13, 2017 at 9:57 AM', 'moby commented on your article: Nice', 'http://ideablr.com/diypage.php?article=Paint a Personalized Card'),
('Andrea', 'serverbedi', 'Nov  9, 2017 at 09:13', 'serverbedi commented on your article: dfgdfgdfgdfg', 'http://ideablr.com/diypage.php?article=Separate the Condiments');

-- --------------------------------------------------------

--
-- Table structure for table `USERPROFILE`
--

CREATE TABLE `USERPROFILE` (
  `USERNAME` varchar(255) NOT NULL,
  `BIO` text,
  `FAVORITES` text,
  `FAVTAG` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USERPROFILE`
--

INSERT INTO `USERPROFILE` (`USERNAME`, `BIO`, `FAVORITES`, `FAVTAG`) VALUES
('styx', '', NULL, 'None'),
('JohnDoe', 'Student at The High School of City. Studying Engineering at the moment. ', NULL, 'Life Hacks'),
('k', 'Test Account.', NULL, 'None'),
('Madeline', 'Hey guys!!', NULL, 'Technology'),
('Julie', 'High School Senior', NULL, 'Arts/crafts'),
('Jayleen', 'bio', NULL, 'None'),
('meow', '', NULL, 'None'),
('SamAcc', 'I like art!', NULL, 'Arts/crafts'),
('adds', 'fsadlk;nfkasjdnf', NULL, 'None'),
('Andrea', 'Hi!', NULL, 'Food'),
('moby', 'efsdv', NULL, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `USERPROFILECOMMENTS`
--

CREATE TABLE `USERPROFILECOMMENTS` (
  `COMMENTBYUSER` varchar(255) NOT NULL,
  `COMMENTFORUSER` varchar(255) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `COMMENT` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USERPROFILECOMMENTS`
--

INSERT INTO `USERPROFILECOMMENTS` (`COMMENTBYUSER`, `COMMENTFORUSER`, `DATE`, `COMMENT`) VALUES
('Jayleen', 'Jayleen', 'Dec  24, 2016 at 8:16 PM', 'Hey profile commenting! '),
('Jayleen', 'Madeline', 'Dec  24, 2016 at 8:17 PM', 'Hi :)'),
('Madeline', 'Jayleen', 'Dec  24, 2016 at 10:29 PM', '<333'),
('meow', 'meow', 'Jan  3, 2017 at 12:38 PM', 'mmkk'),
('SamAcc', 'SamAcc', 'Jan  3, 2017 at 11:25 AM', 'Nice profile!'),
('Jayleen', 'Julie', 'Jan  17, 2017 at 3:31 PM CST', 'Love your articles!'),
('Andrea', 'Andrea', 'Mar  3, 2017 at 10:12 AM', 'Hello!'),
('styx', 'styx', 'Jan  27, 2017 at 9:29 PM', 'Sample comment');

-- --------------------------------------------------------

--
-- Table structure for table `USERPROFILEPICS`
--

CREATE TABLE `USERPROFILEPICS` (
  `USERNAME` varchar(255) NOT NULL,
  `PROFILEPIC` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USERPROFILEPICS`
--

INSERT INTO `USERPROFILEPICS` (`USERNAME`, `PROFILEPIC`) VALUES
('Jayleen', 'tjturtle.jpg'),
('styx', 'avatar.png'),
('Madeline', 'hairybutter.jpg'),
('Andrea', 'sun.jpg'),
('robert', 'MEME .png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
