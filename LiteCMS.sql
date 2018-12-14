-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 09:15 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boldcat`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(6) UNSIGNED NOT NULL,
  `id` varchar(30) NOT NULL,
  `post_id` varchar(30) NOT NULL,
  `comment` varchar(180) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `id`, `post_id`, `comment`, `date`) VALUES
(2, '14', '10', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '2018-11-24 07:04:47'),
(3, '14', '10', 'Hey!', '2018-11-24 07:06:40'),
(4, '14', '10', 'orem ipsum dolor sit amet, consectetur adipiscing ', '2018-11-24 07:19:56'),
(5, '14', '10', 'orem ipsum dolor sit amet, consectetur adipiscing ', '2018-11-24 07:20:13'),
(6, '14', '7', 'Comment test', '2018-11-24 07:22:15'),
(7, '14', '7', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacinia pulvinar ex, quis pretium massa. Etiam eget erat sit amet odio ornare efficitur eget at quam. Morbi porttito', '2018-11-24 07:26:01'),
(8, '14', '7', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam lacinia pulvinar ex, quis pretium massa. Etiam eget erat sit amet odio ornare efficitur eget at quam. Morbi porttito', '2018-11-24 07:26:29'),
(9, '25', '7', 'Yolo', '2018-12-01 14:10:37'),
(18, '25', '7', 'new comment', '2018-12-01 14:11:23'),
(27, '25', '4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullam', '2018-12-03 02:41:11'),
(28, '25', '17', 'hi', '2018-12-06 15:00:37'),
(29, '25', '40', 'hi', '2018-12-06 15:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post` text NOT NULL,
  `image` text NOT NULL,
  `post_date` datetime NOT NULL,
  `liked_by` longtext NOT NULL,
  `disliked_by` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `id`, `post_title`, `post`, `image`, `post_date`, `liked_by`, `disliked_by`) VALUES
(4, 10, 'First Post', 'Let\'s see if this message reaches the database!', 'https://s-media-cache-ak0.pinimg.com/736x/46/7c/b4/467cb46536a3dc85b4137899f48d9e74--manga-art-manga-anime.jpg', '0000-00-00 00:00:00', 'a:3:{i:0;s:7:\"johndoe\";i:1;s:8:\"username\";i:2;s:11:\"rishabh1234\";}', 'a:0:{}'),
(5, 10, 'Second post, Testing Dates', 'What time is it at the moment', 'https://i.pinimg.com/736x/af/6c/b0/af6cb03ebc47854731ff2236baef41c4--anime-toon-anime-hd.jpg', '0000-00-00 00:00:00', 'a:0:{}', 'a:0:{}'),
(6, 10, 'Third post, Testing Dates', 'Passing date into the query directly.', 'https://i.pinimg.com/736x/e5/8c/e4/e58ce4b7c2df0c2578fd429b8d979ed2--manga-art-manga-anime.jpg', '2017-09-03 19:05:38', '', ''),
(7, 10, 'Forth post, Creating new post', 'sending this data to db.', 'https://i.pinimg.com/736x/cf/ab/3c/cfab3cb0f46171b24626a6e7d2230377--cute-anime-boy-anime-guys.jpg', '2017-09-03 19:08:11', 'a:1:{i:0;s:11:\"rishabh1234\";}', 'a:0:{}'),
(9, 10, 'masters', 'how to get rid of her', 'https://i.pinimg.com/736x/0b/dd/a7/0bdda76ad903c09ad27c8870c37443b8--anime-art-girl-anime-girl-cute.jpg', '2017-09-04 17:28:09', '', ''),
(10, 10, 'Masters bug test', 'The first one is input element and the second is used for style in CSS2.\n\nvisibility: hidden; The visibility property specifies whether or not an element is visible.\n\ninput[type=hidden] :- HIDDEN is a TYPE attribute value to the INPUT element for FORMs. It indicates a form field that does not appear visibly in the document and that the user does not interact with. It can be used to transmit state information about the client or server.', 'https://i.pinimg.com/736x/48/5e/e9/485ee975f0386d3037c12e36d91e6b61--rose-art-art-reference.jpg', '2017-09-04 17:28:18', 'a:2:{i:0;s:8:\"username\";i:1;s:11:\"rishabh1234\";}', 'a:0:{}'),
(11, 20, 'Vivamus finibus tempor lectus, ut porttitor velit. Donec nec ligula et diam bibendum semper at id ex.', 'Phasellus sit amet augue rhoncus, placerat diam tempor, fringilla turpis. Aliquam vehicula non magna et mollis. Suspendisse diam est, pharetra nec arcu a, condimentum porttitor erat. Donec mollis nisl eget orci feugiat egestas. Maecenas risus lacus, ultricies id velit eu, porta venenatis tellus. Vivamus ultricies auctor rhoncus. Vivamus pulvinar porttitor nisi, ut interdum ligula pellentesque vitae. Maecenas nec orci at risus vehicula dictum eu sit amet magna. Nulla maximus metus ac lacus luctus, quis efficitur ante suscipit. Duis in tempus urna, et viverra metus. Phasellus vel dapibus lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus finibus tempor lectus, ut porttitor velit. Donec nec ligula et diam bibendum semper at id ex.  Duis fringilla nunc sed ant', 'assets/user_uploads/5bf93be37bc9c7.91961373.jpg', '2018-11-24 12:55:21', '', ''),
(17, 25, 'This post is being made from mobile', 'I\'m trying this for the first time, I have No idea if this would work. I\'m trying this for the first time, I have No idea if this would work. I\'m trying this for the first time, I have No idea if this would work. I\'m trying this for the first time, I have No idea if this would work. I\'m trying this for the first time, I have No idea if this would work. I\'m trying this for the first time, I have No idea if this would work. I\'m trying this for the first time, I have No idea if this would work. I\'m trying this for the first time, I have No idea if this would work. I\'m trying this for the first time, I have No idea if this would work. ', '\nassets/user_uploads/5c03e16f3a60b9.11895208.jpg', '2018-12-02 14:42:09', 'a:1:{i:0;s:11:\"rishabh1234\";}', 'a:0:{}'),
(45, 26, 'The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men. ', '<p style=\"font-weight:500; font-size:2em;\">I\'m serious as a heart attack</p>\nThe path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men. Blessed is he who, in the name of charity and good will, shepherds the weak through the valley of darkness, for he is truly his brother\'s keeper and the finder of lost children. And I will strike down upon thee with great vengeance and furious anger those who would attempt to poison and destroy My brothers. And you will know My name is the Lord when I lay My vengeance upon thee. Uuummmm, this is a tasty burger!\n<br>\n<div class=\"row\">\n<div class=\"col-md-2\"></div>\n<div class=\"col-md-8\">\n<iframe src=\"https://giphy.com/embed/7RlheR3HjyQOk\" width=\"300\" height=\"300\" frameBorder=\"0\" class=\"\" allowFullScreen></iframe>\n</div>\n<div class=\"col-md-2\"></div>\n</div>\n<br>\nMy money\'s in that office, right? If she start giving me some bullshit about it ain\'t there, and we got to go someplace else and get it, I\'m gonna shoot you in the head then and there. Then I\'m gonna shoot that bitch in the kneecaps, find out where my goddamn money is. She gonna tell me too. Hey, look at me when I\'m talking to you, motherfucker. You listen: we go in there, and that nigga Winston or anybody else is in there, you the first motherfucker to get shot. You understand?\n\nUuummmm, this is a tasty burger!\nDo you see any Teletubbies in here? Do you see a slender plastic tag clipped to my shirt with my name printed on it? Do you see a little Asian child with a blank expression on his face sitting outside on a mechanical helicopter that shakes when you put quarters in it? No? Well, that\'s what you see at a toy store. And you must think you\'re in a toy store, because you\'re here shopping for an infant named Jeb.\n\nHold on to your butts\nYour bones don\'t break, mine do. That\'s clear. Your cells react to bacteria and viruses differently than mine. You don\'t get sick, I do. That\'s also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. We\'re on the same curve, just on opposite ends.', '\nassets/user_uploads/5c094d9077b114.38980156.jpg', '2018-12-06 17:26:00', '', ''),
(46, 25, 'I am not sure if you have any questions or need any further information please contact me at the end of the day of the day of the day ', 'The only one who can make a decision about the same time I was just a reminder to check out this week to get a new job is going well with the new sprint Cup of coffee table and a few of my resume and I am a very nice of her own and not a good day I trust that this was the only one who can make a decision about the same class teacher and I will be in the future of our games are based on the phone with me and I will be in the future of our games are based on the same time the East Asian teacher in the next day I die and a great time with your friends have a nice to hear about it I think we are not in my head around San Francisco CA SFO to LAX airport class bag of chips and salsa', '\nassets/user_uploads/5c095f2b3796a1.18093057.jpg', '2018-12-06 18:33:09', '', ''),
(47, 26, 'That\'s clear. Your cells react to bacteria and viruses differently than mine. You don\'t get sick, I do.', '<div class=\'container-fluid\'>\n<div class = \'row\'>\n<div class=\'col-md-12\' style=\"font-size: 3em; font-weight: 500; text-align:center;\">Test heading with P tags\n\n<iframe src=\"https://giphy.com/embed/11lxCeKo6cHkJy\" width=\"453\" height=\"480\" frameBorder=\"0\" class=\"giphy-embed image-fluid\" style=\" max-width: 100%; height: auto; \" allowFullScreen></iframe>\n</div>\n<div class =\'col-md-4\'>\nThat\'s clear. Your cells react to bacteria and viruses differently than mine. You don\'t get sick, I do. That\'s also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. We\'re on the same curve, just on opposite ends.\n</div>\n<div class =\'col-md-4\'>\nThe path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men. Blessed is he who, in the name of charity and good will, shepherds the weak through the valley of darkness, for he is truly his brother\'s keeper and the finder of lost children. And I will strike down upon thee with great vengeance and furious anger those who would attempt to poison and destroy My brothers. And you will know My name is the Lord when I lay My vengeance upon thee.\n</div>\n<div class =\'col-md-4\'>\nThe path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men. Blessed is he who, in the name of charity and good will, shepherds the weak through the valley of darkness, for he is truly his brother\'s keeper and the finder of lost children. And I will strike down upon thee with great vengeance and furious anger those who would attempt to poison and destroy My brothers. And you will know My name is the Lord when I lay My vengeance upon thee.\n</div>\n</div>\n</div>', '\nassets/user_uploads/5c09d4a68b2350.25083112.jpg', '2018-12-07 03:04:29', '', ''),
(48, 25, 'Making it easier for foreigners to work in Japan', '<p><em>The Japanese Diet has passed a bill allowing more workers from overseas into the country. It will go into effect in April. While many business leaders welcome the move, challenges exist, and critics point out that many questions remain unanswered.</em></p>\n<strong><b>Whatâ€™s been decided</b></strong>\n\n<p>The law introduces a new visa status for foreign workers divided into 2 categories.\n\nUnder the first category, non-Japanese workers that have â€œcertain vocational skillsâ€ in specified fields will be allowed to stay in Japan for up to 5 years. They cannot bring their families with them. Under the second, non-Japanese nationals with more advanced skills will be allowed to bring their spouses and children and will be permitted to live in the country indefinitely â€œif conditions are met.â€\n</p>\n<p>The new visa status is expected to open doors for trainees under the current Technical Intern Training Program to stay in the country longer. Trainees who have spent 3 or more years in Japan will be allowed to acquire the first category visa status without taking a test.\n</p>\n\n<p>Government officials estimate 345,000 workers in 14 industrial sectors including construction and agriculture will be accepted in the following 5 years.\n</p>\n', 'https://www3.nhk.or.jp/nhkworld/en/news/editors/13/workinjapan/images/bs_workinjapan_main.jpg', '2018-12-11 18:36:34', 'a:1:{i:0;s:11:\"rishabh1234\";}', 'a:0:{}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(5, 'test', 'crypto@gmaaal.com', 'f9c0000ddff5a51e56e3e421a1b7c0c7'),
(6, 'arav khanna ', 'ahsghbshbhgjhkjiojknkjih', 'eb7df96ce214e4591155f511732a13cc'),
(7, 'rish', 'sa@gmail.com', 'c0a9c3d8c983848170d6c9adc5bf46e8'),
(8, 'as', 'asdasdasdasd@gmail.com', 'c0a9c3d8c983848170d6c9adc5bf46e8'),
(9, 'asddas', 'aas@gmail.com', '3165d33bcc7672fcaa08bd2ef5457df3'),
(10, 'rishabhTest', 's1a@gmail.com', 'f53859b0a875ef8e469688c706fd27ff'),
(11, 'ReCo', 'sam@gmail.com', 'c4f3097c313cc8aa215457b8f501ac6b'),
(12, 'ReCo##', 'sama@gmail.com', 'c4f3097c313cc8aa215457b8f501ac6b'),
(13, 'johndoe', 'john.doe@example.com', '370dd1bd4aa7b549215dc76ae394d054'),
(14, 'username', 'username@gmail.com', '9cdfa8c9f21e651eedba04cd7e47dfce'),
(15, 'newuser1', 'newuser1@gmail.com', 'afa900c139ac40e707ccb352b4b0c105'),
(16, 'newuser2', 'newuser2@gmail.com', 'afa900c139ac40e707ccb352b4b0c105'),
(17, 'username3', 'username3@gmail.com', 'afa900c139ac40e707ccb352b4b0c105'),
(18, 'username4', 'username4@gmail.com', 'afa900c139ac40e707ccb352b4b0c105'),
(19, 'newuser5', 'newuser5@gmail.com', 'afa900c139ac40e707ccb352b4b0c105'),
(20, 'newuser7', 'newuser7@gmail.com', 'afa900c139ac40e707ccb352b4b0c105'),
(21, 'username10', 'username10@gmail.com', 'afa900c139ac40e707ccb352b4b0c105'),
(22, 'username11', 'username11@gmail.com', 'afa900c139ac40e707ccb352b4b0c105'),
(23, 'newuser11', 'newuser11@gmail.com', '2f31478c9bf0fa3cf37aac45679aea48'),
(24, 'username12', 'username12@gmail.com', '2f31478c9bf0fa3cf37aac45679aea48'),
(25, 'rishabh1234', 'rishabh1234@gmail.com', '2f31478c9bf0fa3cf37aac45679aea48'),
(26, 'rishabhnew', 'rishabhnew@gmail.com', '2f31478c9bf0fa3cf37aac45679aea48');

-- --------------------------------------------------------

--
-- Table structure for table `users-bio`
--

CREATE TABLE `users-bio` (
  `id` int(11) NOT NULL,
  `profile_pic` varchar(256) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `joined_on` datetime NOT NULL,
  `about` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users-bio`
--

INSERT INTO `users-bio` (`id`, `profile_pic`, `first_name`, `last_name`, `gender`, `dob`, `joined_on`, `about`) VALUES
(25, 'https://images.fineartamerica.com/images/artworkimages/mediumlarge/1/armored-samurai-nicklas-gustafsson.jpg', 'Rishabh', 'Yadav', 'Male', '0000-00-00', '0000-00-00 00:00:00', 'Proin at euismod leo. Sed placerat, orci at fermentum vestibulum, felis mauris pulvinar purus, ac suscipit lorem nulla sed mauris. Nulla elementum, nisi sed suscipit condimentum, eros neque molestie diam, ut condimentum mi ipsum congue enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in eros nisl. Mauris at eleifend massa. Duis laoreet interdum neque eget fringilla. Fusce pretium augue non leo ultricies, vel fringilla nisi fringilla. In condimentum orci aliquet odio vehicula efficitur.  P');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users-bio`
--
ALTER TABLE `users-bio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
