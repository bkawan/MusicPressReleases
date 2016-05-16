-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2015 at 03:03 PM
-- Server version: 5.6.22
-- PHP Version: 5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xmlPressReleases`
--

-- --------------------------------------------------------

--
-- Table structure for table `saved_press_releases`
--

CREATE TABLE IF NOT EXISTS `saved_press_releases` (
  `pressReleaseID` varchar(255) NOT NULL,
  `subscriberID` mediumint(8) NOT NULL DEFAULT '1',
  `link` varchar(255) NOT NULL DEFAULT 'dsdf',
  `title` varchar(255) NOT NULL DEFAULT 'sdfsd',
  `description` text,
  `dateSaved` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved_press_releases`
--

INSERT INTO `saved_press_releases` (`pressReleaseID`, `subscriberID`, `link`, `title`, `description`, `dateSaved`) VALUES
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89377]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89377]]>', '<![CDATA[GWAR release Kim Dylla as posting war erupts]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/gwar.jpg" />]]><![CDATA[Shock rock legends GWAR are going through more upheaval in the band.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89379]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89379]]>', '<![CDATA[Rolling Stones ''Satisfaction'' 50th anniversary vinyl single]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/rollingstones.jpg" />]]><![CDATA[The Rolling Stones'' signature tune classic, (I CanÂ’t Get No) Satisfaction, will be reissued as a 12 inch vinyl single to mark its 50th anniversary in June.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89380]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89380]]>', '<![CDATA[Lianne La Havas ''Unstoppable'' video]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/Lianne-La-Havas.jpg" />]]><![CDATA[Lianne La Havas made a huge breakthrough with her Top 5 debut album Â‘Is Your Love Big Enough?Â’ which sold 200,000 copies]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89383]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89383]]>', '<![CDATA[The Vaccines announce HMV gig and signing]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/vaccines.jpg" />]]><![CDATA[The Vaccines visit hmv to perform sign copies of their new album ''English Graffiti'' and will also perform live at hmv 363 Oxford Street.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89384]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89384]]>', '<![CDATA[The Jacksons to play BBC Proms in the Park]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/jacksons.jpg" />]]><![CDATA[Ken Bruce has announced today on BBC Radio 2 that the American music legends The Jacksons are to headline at this yearÂ’s BBC Proms in the Park]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89385]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89385]]>', '<![CDATA[Annie Lennox: I donÂ’t understand fans]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89385.jpg" />]]><![CDATA[Annie Lennox avoids socialising before taking to the stage.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89386]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89386]]>', '<![CDATA[Michael Feinstein brings Great American Songbook to London]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/Michael-FEINSTEIN.jpg" />]]><![CDATA[The internationally acclaimed American singer, pianist, producer and musical revivalist, Michael Feinstein, has announced a special show]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89389]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89389]]>', '<![CDATA[Vintage Trouble new album ''1 Hopeful Rd'']]>', '<![CDATA[<img src="http://www.music-news.com/images/news/VintageTrouble.jpg" />]]><![CDATA[1 Hopeful Rd. Â– Vintage TroubleÂ’s first album for Blue Note Records Â– will be released on August 14th.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89390]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89390]]>', '<![CDATA[Cameron ''''supports Nicole through marriage trouble'''']]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89390.jpg" />]]><![CDATA[Cameron Diaz apparently doesn''''t want Nicole Richie and Joel Madden to throw away what they have.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89391]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89391]]>', '<![CDATA[Chrissy Teigen: I want babies with John!]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89391.jpg" />]]><![CDATA[Chrissy Teigen visualises having three or four children with her husband John Legend.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89392]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89392]]>', '<![CDATA[Brooklyn Decker: Elton gives me baby tips]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89392.jpg" />]]><![CDATA[Brooklyn Decker has joked that kids are there to "mess with".]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89398]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89398]]>', '<![CDATA[Carrie Underwood leads CMTs]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89398.jpg" />]]><![CDATA[Those in the running for this yearÂ’s CMT Awards have been revealed.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89399]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89399]]>', '<![CDATA[Cannon: I appreciate the small things]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89399.jpg" />]]><![CDATA[Nick Cannon considered joining the military before breaking into the entertainment industry.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89400]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89400]]>', '<![CDATA[Steven Tyler announces debut country single]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/Steven-Tyler.jpg" />]]><![CDATA[Ahead of his US tour with Aerosmith, legendary Steven Tyler announces his debut Country single Â‘Love Is Your NameÂ’ will be released in the UK on 29 June.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89402]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89402]]>', '<![CDATA[Swift Â‘glowingÂ’ at dinner with Calvin Harris]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89402.jpg" />]]><![CDATA[Taylor Swift and Calvin Harris supposedly looked as if they were having a blast with each other while dining out in Santa Monica, California Tuesday night.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89403]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89403]]>', '<![CDATA[Paul McCartney: Oasis should reform]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/Paul-McCartney.jpg" />]]><![CDATA[Paul McCartney is urging the Gallagher brothers to reform Oasis even though he never reformed his band that they idolised, The Beatles.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89404]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89404]]>', '<![CDATA[Foo Fighters play surprise covers show at county fair]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/FooFighters.jpg" />]]><![CDATA[People who went to the Conejo Valley Days in Thousand Oaks, CA on Saturday to see Foo FightersÂ’ drummer Taylor Hawkins and his side project]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89405]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89405]]>', '<![CDATA[Paloma Faith pulls all Australian dates]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/Paloma-Faith.jpg" />]]><![CDATA[Paloma FaithÂ’s remaining Australian shows have been cancelled.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89406]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89406]]>', '<![CDATA[Aguilera: I love organising daughter''s closet]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89406.jpg" />]]><![CDATA[Christina Aguilera didn''t just sit back and relax on Mother''s Day.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89407]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89407]]>', '<![CDATA[Mariah Carey cancels Vegas show]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89407.jpg" />]]><![CDATA[Mariah Carey has had to cancel a Vegas show due to bronchitis.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89411]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89411]]>', '<![CDATA[Jack Bruce ''Sunshine of Your Love'' gig grows]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/Jack-Bruce.jpg" />]]><![CDATA[Today, on what would have been Jack BruceÂ’s 72nd birthday, further artists were added to the bill for his tribute concert on 24 October]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89412]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89412]]>', '<![CDATA[Catfish and the Bottlemen get Ewan McGregor]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/CatfishandtheBottlemen.jpg" />]]><![CDATA[Band of the moment Catfish and the Bottlemen capture the laid-back spirit of summer with their infectious new single Â‘HourglassÂ’ released June 22nd via Island/Communion.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89413]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89413]]>', '<![CDATA[Brandon Flowers: Radio would tear Killers apart]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89413.jpg" />]]><![CDATA[Brandon Flowers plans to keep shooting for the moon when it comes to his career.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89418]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89418]]>', '<![CDATA[Florence Welch: We''ve all been hurt]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89418.jpg" />]]><![CDATA[Florence Welch has explained the idea behind her intense What Kind of Man video.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89420]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89420]]>', '<![CDATA[Kimye Â‘fighting over radiation exposureÂ’]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89420.jpg" />]]><![CDATA[Kanye West and his wife Kim Kardashian are said to be arguing over whether itÂ’s safe to expose their daughter North to electronics of any kind.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89421]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89421]]>', '<![CDATA[Jordin: IÂ’m over Derulo]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89421.jpg" />]]><![CDATA[Jordin Sparks says sheÂ’s finally over her split from Jason Derulo, and isnÂ’t Â“hurting anymoreÂ”.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89422]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89422]]>', '<![CDATA[Ciara gushes over new beau]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89422.jpg" />]]><![CDATA[Ciara has finally addressed rumours of her alleged romantic relationship with Seattle Seahawks quarterback Russell Wilson, after months of keeping mum.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89423]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89423]]>', '<![CDATA[Gomez: This year is so exciting]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89423.jpg" />]]><![CDATA[Selena Gomez has promised her fans they Â“wonÂ’t be disappointedÂ” with her new music.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89424]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89424]]>', '<![CDATA[Kidman: Sunday wants to be on The Voice Kids]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89424.jpg" />]]><![CDATA[Nicole Kidman says daughter Sunday Rose wants to compete on singing competition TV show The Voice Kids.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89426]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89426]]>', '<![CDATA[Geri Halliwell''s Spice kids wedding]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89426.jpg" />]]><![CDATA[Geri Halliwell will reportedly arrive at her wedding in a Formula One car today.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89427]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89427]]>', '<![CDATA[B.B. King dies]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89427.jpg" />]]><![CDATA[Blues legend B.B. King has passed away at the age of 89.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89429]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89429]]>', '<![CDATA[Steve Aoki cancels all gigs ahead of surgery]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/Steve-Aoki.jpg" />]]><![CDATA[DJ Steve Aoki has cancelled five European performances while he undergoes throat surgery.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89430]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89430]]>', '<![CDATA[David Cassidy loses drivers license]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/David-Cassidy.jpg" />]]><![CDATA[David Cassidy will not be driving himself anywhere anytime soon.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89432]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89432]]>', '<![CDATA[Liam Payne: Zayn''s exit made us angry]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89432.jpg" />]]><![CDATA[One Direction have spoken out about Zayn Malik quitting the group.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89433]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89433]]>', '<![CDATA[Madonna undisputed queen of Billboard chart]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/Madonna.jpg" />]]><![CDATA[Madonna is the new reigning queen of a single Billboard chart.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89439]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89439]]>', '<![CDATA[Geri HalliwellÂ’s wedding lacks a few Spices]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89439.jpg" />]]><![CDATA[Victoria Beckham has apologised to Geri Halliwell after missing her wedding day to Christian Horner.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89441]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89441]]>', '<![CDATA[Kevin Federline: Time heals everything]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89441.jpg" />]]><![CDATA[Kevin Federline says his family with ex-wife Britney Spears Â“is greatÂ”.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89442]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89442]]>', '<![CDATA[Florence Welch: I wore myself out]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89442.jpg" />]]><![CDATA[Florence Welch wrestled with her demons during a break from performing.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89443]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89443]]>', '<![CDATA[Brandon Flowers: The Killers are under appreciated]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89443.jpg" />]]><![CDATA[Brandon Flowers thinks The Killers are Â“the best band in the last long timeÂ”.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89444]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89444]]>', '<![CDATA[Jaime King: TaylorÂ’s authentic]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89444.jpg" />]]><![CDATA[Jaime King has revealed the reasons why she chose BFF Taylor Swift to be her unborn babyÂ’s godmother.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89447]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89447]]>', '<![CDATA[Bey and Jay''s ''pre-Met Gala bust-up'']]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89447.jpg" />]]><![CDATA[Beyonc&eacute; Knowles and Jay Z were apparently "on edge" ahead of this year''s Met Gala, following the incident at the 2014 event.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89448]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89448]]>', '<![CDATA[Gwen Stefani: Stop with the selfies!]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89448.jpg" />]]><![CDATA[Gwen Stefani is so pleased her talented friend Pharrell Williams is taking over the world with his music.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89453]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89453]]>', '<![CDATA[Eric Clapton B.B. King tribute]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/BBKing.jpg" />]]><![CDATA[Eric Clapton has recorded a video message to pay his respects to his friend, B.B. King.<br>]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89454]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89454]]>', '<![CDATA[The Edge takes a tumble off stage]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/u2.jpg" />]]><![CDATA[U2 kicked off their Innocence + Experience world tour in Vancouver, Canada and he wasnÂ’t without problems. The Edge fell off the stage during]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89466]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89466]]>', '<![CDATA[Taylor Swift shares her musical inspirations]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89466.jpg" />]]><![CDATA[Taylor Swift has shared the songs that have influenced her musical career.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89470]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89470]]>', '<![CDATA[Sam Smith: I''ll never be attention seeking]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89470.jpg" />]]><![CDATA[Sam Smith thinks it''s a shame that outrageous stars get the most attention.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89471]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89471]]>', '<![CDATA[Kim and Kanye''''s ''''image boosted'''']]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89471.jpg" />]]><![CDATA[Kim Kardashian and Kanye West are apparently enjoying a newly-relaxed romance.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89472]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89472]]>', '<![CDATA[Charli XCX: Dancing is my high]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89472.jpg" />]]><![CDATA[Charli XCX likes to freak people out when she''s on stage.]]>', '2015-05-18 04:51:46'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89476]]>', 6, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89476]]>', '<![CDATA[Nick Jonas: I can laugh at myself]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89476.jpg" />]]><![CDATA[Nick Jonas Â“alwaysÂ” enjoys watching Kelly Clarkson perform.]]>', '2015-05-18 04:39:55'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89681]]>', 2, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89681]]>', '<![CDATA[Ricky Martin: I donÂ’t need an Adonis]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89681.jpg" />]]><![CDATA[Ricky Martin has realised he can''t bring men home now he is a father.]]>', '2015-06-01 13:13:34'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89683]]>', 2, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89683]]>', '<![CDATA[Hailee Steinfeld: I want to live Bad Blood]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89683.jpg" />]]><![CDATA[Hailee Steinfeld would like to see an extended version of Taylor SwiftÂ’s Bad Blood video.]]>', '2015-06-01 13:11:57'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89683]]>', 3, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89683]]>', '<![CDATA[Hailee Steinfeld: I want to live Bad Blood]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/cover/89683.jpg" />]]><![CDATA[Hailee Steinfeld would like to see an extended version of Taylor SwiftÂ’s Bad Blood video.]]>', '2015-06-01 13:20:42'),
('<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89798]]>', 1, '<![CDATA[http://www.music-news.com/ShowNews.asp?nItemID=89798]]>', '<![CDATA[John Newman returns with new single]]>', '<![CDATA[<img src="http://www.music-news.com/images/news/John-Newman.jpg" />]]><![CDATA[John Newman, one of the major breakthrough artists in the UK in recent years, makes his eagerly awaited return with the release on July 17th]]>', '2015-06-04 13:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE IF NOT EXISTS `subscriber` (
  `subscriberID` mediumint(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`subscriberID`, `email`, `name`, `password`, `lastlogin`) VALUES
(1, 'peter@xml667.com', 'Peter Jones', '4b8373d016f277527198385ba72fda0feb5da015', '2015-06-04 13:55:47'),
(2, 'fred@xml667.com', 'Fred Smith', '31017a722665e4afce586950f42944a6d331dabf', '2015-06-01 13:14:28'),
(3, 'susan@xml667.com', 'Susan Davis', 'd8f68c1ab79ab971a3835f2c0315c34f8214a113', '2015-06-01 17:19:54'),
(6, 'bi@gmail.com', 'bisdfds', 'bf9ae9b5b002cd756e2834d70d9def98c4a2535b', '2015-05-18 22:28:11'),
(7, 'b@gmail.com', 'bike', 'bf9ae9b5b002cd756e2834d70d9def98c4a2535b', '0000-00-00 00:00:00'),
(8, 'bik@gmail.com', 'bdfsf@gmail.com', 'bf9ae9b5b002cd756e2834d70d9def98c4a2535b', '0000-00-00 00:00:00'),
(9, 'bikes@gmail.com', 'bikes@', 'bf9ae9b5b002cd756e2834d70d9def98c4a2535b', '0000-00-00 00:00:00'),
(10, 'biiii@gmail.com', 'sdfds', 'bf9ae9b5b002cd756e2834d70d9def98c4a2535b', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `saved_press_releases`
--
ALTER TABLE `saved_press_releases`
  ADD PRIMARY KEY (`pressReleaseID`,`subscriberID`), ADD KEY `press_releases_fk_1` (`subscriberID`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`subscriberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `subscriberID` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `saved_press_releases`
--
ALTER TABLE `saved_press_releases`
ADD CONSTRAINT `press_releases_fk_1` FOREIGN KEY (`subscriberID`) REFERENCES `subscriber` (`subscriberID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
