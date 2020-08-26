-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2020 at 07:09 AM
-- Server version: 5.6.48-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_build`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@buildapp.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `aoi`
--

CREATE TABLE `aoi` (
  `aoi_id` int(11) NOT NULL,
  `aoi` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aoi`
--

INSERT INTO `aoi` (`aoi_id`, `aoi`) VALUES
(1, 'Earthworks'),
(2, 'Concrete works'),
(3, 'Structural Steel'),
(4, 'Wetworks'),
(5, 'Waterproofing'),
(6, 'Carpentry and Joinery'),
(7, 'Ceilings, Partitions, Access Flooring'),
(8, 'Metalwork'),
(9, 'Floor and wall Coverings'),
(10, 'Services'),
(11, 'Finishes'),
(12, 'External works');

-- --------------------------------------------------------

--
-- Table structure for table `aoi_description`
--

CREATE TABLE `aoi_description` (
  `aoi_desc_id` int(11) NOT NULL,
  `aoi_id` int(11) NOT NULL,
  `aoi_desc` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aoi_description`
--

INSERT INTO `aoi_description` (`aoi_desc_id`, `aoi_id`, `aoi_desc`) VALUES
(1, 1, 'Compaction'),
(2, 1, 'Excavation'),
(3, 1, 'Filling'),
(4, 2, 'Concrete'),
(5, 2, 'Formwork'),
(6, 2, 'Reinforcement'),
(7, 2, 'Precast Concrete'),
(8, 3, 'Steel columns'),
(9, 3, 'Steel Roof structure'),
(10, 3, 'Structural steel beams'),
(11, 3, 'I-beams'),
(12, 3, 'Steel plates'),
(13, 4, 'Brickwork'),
(14, 4, 'Stonework'),
(15, 4, 'Plaster'),
(16, 4, 'Gypsum Plaster'),
(17, 4, 'Screed'),
(18, 5, 'Torch on'),
(19, 5, 'Plastic inserts'),
(20, 5, 'Under floor waterproofing'),
(21, 6, 'Doors'),
(22, 6, 'Windows'),
(23, 6, 'Cabinetry'),
(24, 6, 'Woodworks'),
(25, 6, 'Skirting'),
(26, 6, 'Timer roof trusses'),
(27, 7, 'Drywalling'),
(28, 7, 'Ceilings'),
(29, 7, 'Access flooring'),
(30, 7, 'Insulation'),
(31, 8, 'Aluminium doors'),
(32, 8, 'Aluminium windows'),
(33, 8, 'Steel doors'),
(34, 8, 'Steel door frames'),
(35, 8, 'Steel window frames'),
(36, 9, 'Tiling'),
(37, 9, 'Carpeting'),
(38, 9, 'Vinyl floors'),
(39, 9, 'Laminated flooring'),
(40, 9, 'Wallpaper'),
(41, 10, 'Plumbing'),
(42, 10, 'Electrical'),
(43, 10, 'Heating, Ventilation and Air Conditioning'),
(44, 10, 'Fire Protection'),
(45, 11, 'Sanitary Ware'),
(46, 11, 'Ironmongery'),
(47, 11, 'Bathroom fittings'),
(48, 11, 'Kitchen fittings'),
(49, 11, 'Appliances'),
(50, 11, 'Paintworks'),
(51, 11, 'Mirrors'),
(52, 11, 'Glass work'),
(53, 11, 'Glazing'),
(54, 11, 'Light fittings'),
(55, 11, 'Switches and plugs'),
(56, 12, 'Paving'),
(57, 12, 'Landscaping'),
(58, 12, 'Pools'),
(59, 12, 'Water features'),
(60, 12, 'Irrigation'),
(67, 10, 'LP Gas installers'),
(68, 10, 'Solar Power Suppliers'),
(69, 10, 'Solar Geyser suppliers'),
(70, 10, 'Solar power installers'),
(71, 10, 'Solar geyser installers'),
(72, 10, 'Rain water and gutter specilists');

-- --------------------------------------------------------

--
-- Table structure for table `app_setting`
--

CREATE TABLE `app_setting` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_setting`
--

INSERT INTO `app_setting` (`id`, `type`, `text`) VALUES
(1, 'Terms and Conditions', 'PRIVACY POLICY\r\n\r\n\r\n\r\n1. INTRODUCTION BuildApp recognizes the\r\nimportance of protecting the personal information that you (“the \r\n\r\nUser”) provide to\r\nus. Therefore, we have put together, and endeavor to follow this policy that\r\nrespects and addresses this.2. INFORMATION COLLECTION \r\n\r\n\r\n2.1BuildApp collects information from the User at several\r\ndifferent points on the Site. \r\n\r\nBuildApp is the\r\nsole owner of the information collected on its website (“the Site”). We may sell,\r\nshare, or rent this information to others in ways different from what is\r\ndisclosed in this statement. \r\n\r\n\r\n2.2\r\n Consent to collect information can\r\nbe express (eg. signing an agreement and/or clicking a prompt box) or implied\r\n(eg. if the User is given an opportunity to opt-out of a specific form of\r\ninformation sharing, but chooses not to do so, BuildApp implies that the User\r\nchooses to share this information with us). \r\n\r\n\r\n\r\n\r\n2.3  BuildApp\r\nprocesses personal information on web hosting servers which may not be in your\r\npresent country. If you are located outside of South Africa and choose to\r\nprovide information to us, please note that we transfer the data, including\r\nPersonal Data, to South Africa and process it there. Your information,\r\nincluding Personal Data, may be transferred to – and maintained on – computers\r\nlocated outside of your state, province, country or other governmental\r\njurisdiction where the data protection laws may differ than those from your\r\njurisdiction.\r\n\r\n\r\n\r\n2.4 We may appoint third-party companies and individuals to\r\nfacilitate our Service, to provide the Service on our behalf, to perform\r\nService-related services or to assist us in analysing how our Service is used. These\r\nthird parties have access to your Personal Data only to perform these tasks on\r\nour behalf and are obligated not to disclose or use it for any other purpose.\r\n\r\n\r\n3. INFORMATION WE COLLECT \r\n\r\n\r\n\r\nIn the course of\r\nservice provision to the User we may collect certain forms of information. The\r\ntypes of information that we may collect are detailed below: \r\n\r\n\r\nInformation\r\nyou provide – When you register for an account on BuildApp by completing\r\nthe appropriate form, we ask you for personal information (such as your name,\r\nemail address, phone number and passport number). We may combine the\r\ninformation you submit under your account with information from other services\r\nor third parties in order to provide you with a better experience and to\r\nimprove the quality of our service. \r\n\r\n\r\nFinancial\r\nInformation – In the course of providing a service to you, BuildApp may ask\r\nfor financial information (Bank account details, credit card details etc.).\r\nSuch information will be treated with the upmost privacy and will be stored\r\nencrypted on our database which are PCI and GDPR level 1 compliant with a\r\nminimum of 128 bit encryption. This information will only be communicated\r\nacross a secure channel and will not be provided to any third parties except\r\nwhere necessary to provide service to you. \r\n\r\n\r\nCookies\r\n– When you visit BuildApp, we may send one or more cookies – a small file\r\ncontaining a string of characters – to your computer that uniquely identifies\r\nyour browser. We use cookies to improve the quality of our service by storing\r\nuser preferences or storing session information. Most browsers are initially\r\nset up to accept cookies, but you can reset your browser to refuse all cookies\r\nor to indicate when a cookie is being sent. However, this is not advised as\r\nsome features (and indeed our service itself) may not function correctly if\r\nyour cookies are disabled. \r\n\r\n\r\nLog\r\ninformation – When you use the Site, our server automatically records\r\ninformation that your browser sends whenever you visit a website. These server\r\nlogs may include information such as your web request, Internet Protocol\r\naddress, browser type, browser language, the date and time of your request and\r\none or more cookies that may uniquely identify your browser. \r\n\r\n\r\nUser\r\ncommunications – When you send email or other communication to us, we may\r\nretain those communications in order to process your enquiries, respond to your\r\nrequests and improve our services. \r\n\r\n\r\nLinks\r\n– BuildApp may present links in a format that enables us to keep track of whether\r\nthese links have been followed and who followed them, either on the web site or\r\nin electronic communications. We use this information to improve the quality of\r\nour service, customized content and advertising. \r\n\r\n\r\nOther\r\nsites – This Privacy Policy only applies to\r\nBuildApp. We do not exercise control over any third party sites who we\r\nhave partnered with to deliver a service to you. These other sites may place\r\ntheir own cookies or other files on your computer, collect data or solicit\r\npersonal information from you, over which BuildApp has no control. \r\n\r\n\r\n4. HOW THIS INFORMATION IS USED \r\n\r\n\r\n4.1  BuildApp collects user information for the purposes described\r\nbelow: \r\n\r\n•Providing\r\na service to our users, including the display of customized content and\r\nadvertising; \r\n\r\n•Conveying\r\nthe information to contracted third-party service providers (Principals) for\r\npurposes of obtaining quotations from them, securing bookings with them and/or\r\nprocessing payments through them; \r\n\r\n• Auditing,\r\nresearch and analysis in order to maintain, protect and improve our service; \r\n\r\n•Ensuring\r\nthe technical functioning of our equipment and resources; \r\n\r\n• Developing\r\nnew services.\r\n\r\n\r\n\r\n4.2While\r\nmostly this information will be used to provide a service to our users, it may\r\nalso be used to provide our own services.\r\n\r\n\r\n4.3 We\r\nwill not collect or use sensitive information for purposes other than those\r\ndescribed in this Privacy Policy unless we have obtained your prior consent. \r\n\r\n\r\n\r\n4.4 We will\r\nutilize third-party Service Providers, such as Google Analytics, to monitor and\r\nanalyse the use of our Services. \r\n\r\n\r\n\r\n5. COMMUNICATIONS \r\n\r\n\r\n\r\n5.1  BuildApp may send the User, site and service announcement\r\nupdates on an irregular basis. Users are able to unsubscribe from service\r\nannouncements, should they so require.\r\n5.2 On occasion BuildApp will email newsletters to provide the User\r\nwith information that we think the User will find useful, including information\r\nabout new products and services. We might also contact the User by email to see\r\nif the User is interested in participating in market research regarding BuildApp.\r\nWe may also contact the User by email to respond to customer-service complaints\r\nthat the User has submitted, to address a problem affecting the User’s use of\r\nthe service or to verify the User’s account information if the User submits a\r\npassword request. \r\n\r\n\r\n6. DATA INTEGRITY \r\n\r\n\r\n\r\nBuildApp processes\r\npersonal information only for the purposes for which it was collected and in\r\naccordance with this Privacy Policy. We review our data collection, storage and\r\nprocessing practices to ensure that we only collect, store and process the\r\npersonal information needed to provide or improve our services. We take\r\nreasonable steps to ensure that the personal information we process is\r\naccurate, complete, and current, but we depend on our users to update or\r\ncorrect their personal information whenever necessary and possible. \r\n\r\n\r\n\r\n7. INFORMATION SECURITY \r\n\r\n\r\n\r\n7.1 We take appropriate security measures to protect against\r\nunauthorized access to or unauthorized alteration, disclosure or destruction of\r\ndata. The servers that we store personally identifiable information on are cloud\r\nhosted and are PCI and GDPR level 1 compliant with a minimum of 128 bit\r\nencryption. \r\n\r\n\r\n\r\n7.2 We restrict access to\r\npersonal information to BuildApp employees who need to know that information in\r\norder to operate, develop or improve our services. \r\n\r\n\r\n8. NOTIFICATION OF CHANGES \r\n\r\n\r\n\r\n8.1 This policy may be revised over time as new features are added\r\nto the Site and/or as changes are required due to changing circumstance and any\r\napplicable laws. We will post our new Privacy Policy, along with the date of\r\nits last revision, prominently so that the User will always know what\r\ninformation we gather, how we might use that information, and whether we will\r\ndisclose it to anyone. \r\n\r\n\r\n18.2  BuildApp is, however, under no obligation to inform the User of\r\nsuch changes when they happen, although it is assumed that any changes will be\r\nminor and will not fundamentally impact the User. Should the change be deemed\r\nby BuildApp be significant, we will endeavour to inform the User of these\r\nchanges through whatever means we deem necessary (banner on home page, email\r\nnotification etc.) in a timely manner. \r\n\r\n\r\n\r\n11. TERMS \r\n\r\n\r\n\r\n11.1 The terms “The User” and “User” are used interchangeably and\r\nrefer to all individuals and/or entities accessing this web site for any reason\r\nwhatsoever. \r\n\r\n\r\n\r\n11.2 The terms “we” and BuildApp are used interchangeably and refer\r\nto BuildApp itself and all individuals and/or entities acting directly on\r\nbehalf of BuildApp.'),
(2, 'Privacy Policy', 'PRIVACY POLICY \r\n1. INTRODUCTION \r\n\r\n\r\nBuildApp recognises the\r\nimportance of protecting the personal information that you (“the User”) provide to\r\nus. Therefore, we have put together, and endeavour to follow this policy that\r\nrespects and addresses this\r\n\r\n\r\n2. INFORMATION COLLECTION \r\n\r\n\r\n2.1 BuildApp collects information from the User at several\r\ndifferent points on the Site. \r\n\r\nBuildApp is the\r\nsole owner of the information collected on its website (“the Site”). We may sell,\r\nshare, or rent this information to others in ways different from what is\r\ndisclosed in this statement. \r\n\r\n2.2 Consent to collect information can\r\nbe express (eg. signing an agreement and/or clicking a prompt box) or implied\r\n(eg. if the User is given an opportunity to opt-out of a specific form of\r\ninformation sharing, but chooses not to do so, BuildApp implies that the User\r\nchooses to share this information with us). \r\n\r\n\r\n2.3 BuildApp\r\nprocesses personal information on web hosting servers which may not be in your\r\npresent country. If you are located outside of South Africa and choose to\r\nprovide information to us, please note that we transfer the data, including\r\nPersonal Data, to South Africa and process it there. Your information,\r\nincluding Personal Data, may be transferred to – and maintained on – computers\r\nlocated outside of your state, province, country or other governmental\r\njurisdiction where the data protection laws may differ than those from your\r\njurisdiction. 2.4 We may appoint third-party companies and individuals to\r\nfacilitate our Service, to provide the Service on our behalf, to perform\r\nService-related services or to assist us in analysing how our Service is used. These\r\nthird parties have access to your Personal Data only to perform these tasks on\r\nour behalf and are obligated not to disclose or use it for any other purpose.\r\n\r\n\r\n3. INFORMATION WE COLLECT \r\n\r\n\r\nIn the course of\r\nservice provision to the User we may collect certain forms of information. The\r\ntypes of information that we may collect are detailed below: \r\n\r\n\r\nInformation\r\nyou provide – When you register for an account on BuildApp by completing\r\nthe appropriate form, we ask you for personal information (such as your name,\r\nemail address, phone number and passport number). We may combine the\r\ninformation you submit under your account with information from other services\r\nor third parties in order to provide you with a better experience and to\r\nimprove the quality of our service. \r\nFinancial\r\nInformation – In the course of providing a service to you, BuildApp may ask\r\nfor financial information (Bank account details, credit card details etc.).\r\nSuch information will be treated with the upmost privacy and will be stored\r\nencrypted on our database which are PCI and GDPR level 1 compliant with a\r\nminimum of 128 bit encryption. This information will only be communicated\r\nacross a secure channel and will not be provided to any third parties except\r\nwhere necessary to provide service to you. \r\n\r\n\r\nCookies\r\n– When you visit BuildApp, we may send one or more cookies – a small file\r\ncontaining a string of characters – to your computer that uniquely identifies\r\nyour browser. We use cookies to improve the quality of our service by storing\r\nuser preferences or storing session information. Most browsers are initially\r\nset up to accept cookies, but you can reset your browser to refuse all cookies\r\nor to indicate when a cookie is being sent. However, this is not advised as\r\nsome features (and indeed our service itself) may not function correctly if\r\nyour cookies are disabled. \r\n\r\n\r\nLog\r\ninformation – When you use the Site, our server automatically records\r\ninformation that your browser sends whenever you visit a website. These server\r\nlogs may include information such as your web request, Internet Protocol\r\naddress, browser type, browser language, the date and time of your request and\r\none or more cookies that may uniquely identify your browser. \r\n\r\n\r\nUser\r\ncommunications – When you send email or other communication to us, we may\r\nretain those communications in order to process your enquiries, respond to your\r\nrequests and improve our services. \r\n\r\n\r\nLinks\r\n– BuildApp may present links in a format that enables us to keep track of whether\r\nthese links have been followed and who followed them, either on the web site or\r\nin electronic communications. We use this information to improve the quality of\r\nour service, customized content and advertising. \r\n\r\n\r\nOther\r\nsites – This Privacy Policy only applies to&nbsp;\r\nBuildApp. We do not exercise control over any third party sites who we\r\nhave partnered with to deliver a service to you. These other sites may place\r\ntheir own cookies or other files on your computer, collect data or solicit\r\npersonal information from you, over which BuildApp has no control. \r\n\r\n\r\n\r\n4. HOW THIS INFORMATION IS USED \r\n\r\n\r\n\r\n4.1 BuildApp collects user information for the purposes described\r\nbelow: \r\n\r\nProviding\r\na service to our users, including the display of customized content and\r\nadvertising; \r\n\r\nConveying\r\nthe information to contracted third-party service providers (Principals) for\r\npurposes of obtaining quotations from them, securing bookings with them and/or\r\nprocessing payments through them; \r\n\r\nAuditing,\r\nresearch and analysis in order to maintain, protect and improve our service; \r\n\r\nEnsuring\r\nthe technical functioning of our equipment and resources; \r\n\r\nDeveloping\r\nnew services.\r\n\r\n\r\n\r\n4.2 While\r\nmostly this information will be used to provide a service to our users, it may\r\nalso be used to provide our own services.\r\n\r\n\r\n\r\n4.3 We\r\nwill not collect or use sensitive information for purposes other than those\r\ndescribed in this Privacy Policy unless we have obtained your prior consent. \r\n\r\n\r\n\r\n4.4 We will\r\nutilize third-party Service Providers, such as Google Analytics, to monitor and\r\nanalyse the use of our Services. \r\n\r\n\r\n\r\n5. COMMUNICATIONS \r\n\r\n\r\n\r\n5.1 BuildApp may send the User, site and service announcement\r\nupdates on an irregular basis. Users are able to unsubscribe from service\r\nannouncements, should they so require.\r\n\r\n\r\n\r\n5.2  On occasion BuildApp will email newsletters to provide the User\r\nwith information that we think the User will find useful, including information\r\nabout new products and services. We might also contact the User by email to see\r\nif the User is interested in participating in market research regarding BuildApp.\r\nWe may also contact the User by email to respond to customer-service complaints\r\nthat the User has submitted, to address a problem affecting the User’s use of\r\nthe service or to verify the User’s account information if the User submits a\r\npassword request. \r\n\r\n\r\n\r\n6. DATA INTEGRITY \r\n\r\n\r\n\r\nBuildApp processes\r\npersonal information only for the purposes for which it was collected and in\r\naccordance with this Privacy Policy. We review our data collection, storage and\r\nprocessing practices to ensure that we only collect, store and process the\r\npersonal information needed to provide or improve our services. We take\r\nreasonable steps to ensure that the personal information we process is\r\naccurate, complete, and current, but we depend on our users to update or\r\ncorrect their personal information whenever necessary and possible. \r\n\r\n\r\n7. INFORMATION SECURITY \r\n\r\n\r\n\r\n7.1 We take appropriate security measures to protect against\r\nunauthorized access to or unauthorized alteration, disclosure or destruction of\r\ndata. The servers that we store personally identifiable information on are cloud\r\nhosted and are PCI and GDPR level 1 compliant with a minimum of 128 bit\r\nencryption. \r\n\r\n\r\n\r\n7.2 We restrict access to\r\npersonal information to BuildApp employees who need to know that information in\r\norder to operate, develop or improve our services. \r\n\r\n\r\n8. NOTIFICATION OF CHANGES \r\n\r\n\r\n\r\n8.1  This policy may be revised over time as new features are added\r\nto the Site and/or as changes are required due to changing circumstance and any\r\napplicable laws. We will post our new Privacy Policy, along with the date of\r\nits last revision, prominently so that the User will always know what\r\ninformation we gather, how we might use that information, and whether we will\r\ndisclose it to anyone. \r\n\r\n\r\n\r\n18.2 BuildApp is, however, under no obligation to inform the User of\r\nsuch changes when they happen, although it is assumed that any changes will be\r\nminor and will not fundamentally impact the User. Should the change be deemed\r\nby BuildApp be significant, we will endeavour to inform the User of these\r\nchanges through whatever means we deem necessary (banner on home page, email\r\nnotification etc.) in a timely manner. \r\n\r\n\r\n\r\n11. TERMS \r\n\r\n\r\n\r\n11.1 The terms “The User” and “User” are used interchangeably and\r\nrefer to all individuals and/or entities accessing this web site for any reason\r\nwhatsoever. \r\n\r\n\r\n\r\n11.2 The terms “we” and BuildApp are used interchangeably and refer\r\nto BuildApp itself and all individuals and/or entities acting directly on\r\nbehalf of BuildApp.'),
(3, 'About Us', 'BuildApp Tender World allows clients to post the requirements of their building projects onto the App to get multiple quotations. Clients can then hire reputable building contractors, subcontractors , labourers or suppliers based on what they receive back.Filters can be used to identify specific requirements of these builders or the other stakeholders based on location, quality level, price and availability.BuildApp Tender World provides a platform for anyone taking on a building project to compare prices in the market place and appoint the correct contractor for the job.BuildApp is the primary mobile application to use when commencing any building projectBuildApp Marketplace is a platform that connects building professionals with private individuals requiring building services.Users of the app can either register as a building contractor, a specialized subcontractor, a labourer, or a materials/equipment supplier. Users are then able to either be contacted directly by private individuals requiring their specific services, or given the opportunity to submit a bid on any projects posted for tender on the platform.BuildApp Marketplace also allows contractors to buy/rent/sell any excess resources to each other via the platform. BuildApp is the ultimate mobile application to connect building contractors with the correct clients in search of their services');

-- --------------------------------------------------------

--
-- Table structure for table `contractor_bid`
--

CREATE TABLE `contractor_bid` (
  `bid_id` int(11) NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_post_id` int(11) NOT NULL,
  `ucc_id` int(11) NOT NULL,
  `cost_range` varchar(255) NOT NULL,
  `availablity` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `cost_m2` int(11) NOT NULL,
  `site_visit` enum('yes','no') NOT NULL,
  `duration` varchar(20) NOT NULL,
  `link` varchar(255) NOT NULL,
  `response` enum('0','1','') NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractor_bid`
--

INSERT INTO `contractor_bid` (`bid_id`, `contractor_id`, `user_id`, `user_post_id`, `ucc_id`, `cost_range`, `availablity`, `description`, `cost_m2`, `site_visit`, `duration`, `link`, `response`, `time`) VALUES
(1, 34, 8, 7, 0, '1800', '2020-4-16', 'nothing', 15, 'yes', '5 Month', '', '1', '2020-04-15'),
(2, 34, 8, 7, 0, '1500', '2020-4-21', 'yws', 300, 'yes', '15 Day', '', '', '2020-04-20'),
(3, 36, 8, 7, 0, '50', '2020-4-30', 'no', 200, 'yes', '4Day', '', '', '2020-04-20'),
(4, 36, 8, 7, 0, '20', '2020-4-30', 'no', 50, 'yes', '4Day', '', '', '2020-04-20'),
(5, 52, 8, 7, 0, '58', '2020-5-29', 'test', 30, 'yes', '20 Day', '', '', '2020-05-13'),
(6, 52, 8, 7, 0, '58', '2020-5-29', 'test', 30, 'yes', '20 Day', '', '', '2020-05-13'),
(7, 52, 8, 7, 0, '50', '2020-5-30', 'test', 50, 'no', '30 Day', '', '', '2020-05-19'),
(8, 109, 8, 7, 0, '1', '05/22/2020', 'Test', 1, 'yes', '1 Month', 'test', '', '2020-05-22'),
(9, 12, 11, 10, 0, '1500', '2020-6-15', 'let me know', 15, 'yes', '5 Day', 'www.viridicon.co.za ', '', '2020-06-10'),
(10, 141, 60, 29, 0, '1300', '09/08/2020', 'Hi', 1000, 'yes', '50 Day', 'www.dw.com', '1', '2020-07-08'),
(11, 163, 65, 32, 0, '5000', '2020-8-24', 'test description', 10, 'yes', '2Day', '', '1', '2020-08-15'),
(12, 163, 65, 32, 0, '40000', '2020-8-26', 'ggtf', 556, 'yes', '2 Day', '', '1', '2020-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `contractor_bid_images`
--

CREATE TABLE `contractor_bid_images` (
  `id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractor_bid_images`
--

INSERT INTO `contractor_bid_images` (`id`, `bid_id`, `images`) VALUES
(1, 1, '13376.jpg'),
(2, 2, '82074.jpg'),
(3, 3, '67564.jpg'),
(4, 4, '91126.jpg'),
(5, 5, '29621.jpg'),
(6, 6, '53555.jpg'),
(7, 7, '62789.jpg'),
(8, 8, '79140.jpeg'),
(9, 10, '41565.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `contractor_details`
--

CREATE TABLE `contractor_details` (
  `contractor_detail_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `capablity` varchar(255) NOT NULL,
  `work_exp` varchar(255) NOT NULL,
  `cost_range` int(11) NOT NULL,
  `statutory` varchar(255) DEFAULT NULL,
  `bids` int(11) NOT NULL DEFAULT '1000',
  `link` varchar(255) DEFAULT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractor_details`
--

INSERT INTO `contractor_details` (`contractor_detail_id`, `market_user_id`, `image`, `company_name`, `capablity`, `work_exp`, `cost_range`, `statutory`, `bids`, `link`, `time`) VALUES
(8, 41, '1635374172.jpg', 'Tricon air conditioning and refrigeration (pty) ltd', 'hvac and refrigeration ', 'we supply, install and service all hvac and refrigeration equipment ', 650, '859015518.jpg', 1000, 'www.triconairconditioning.co.za ', '2020-05-14'),
(3, 12, '1453288781.jpg', 'Viridicon Construction ', 'Main Contracting of Commercial and Residential construction, Project Management, Solar Power ', '10 years ', 9500, '1081780954.jpg', 999, 'www.viridicon.co.za', '2020-05-12'),
(4, 16, '777439332.jpeg', 'Alunite Glass & Aluminium ', 'Small to large projects up to R5 000 000,00', 'Glazing 6 Years, Construction 15 Years', 0, '176202221.jpeg', 1000, 'www.alunitepta.co.za', '2020-03-30'),
(5, 19, '1650807603.jpeg', 'Anelco Construction & Project Management ', 'Project Management, Business Management ', '14 years conpany owner at Anelco Construction & Project Management ', 0, '455934580.jpeg', 1000, '', '2020-03-31'),
(6, 34, '', 'designoweb', 'contractor', '12 years', 1500, '229445252.jpg', 998, 'designowe.com', '2020-04-15'),
(7, 36, '', 'designoweb ', 'roofing', '2', 500, '1765215588.jpg', 998, 'www.designoweb.com', '2020-04-20'),
(9, 48, '', 'Afri Spear Construction Pty Ltd', 'construction company', '8 years experience', 1400, '607536680.jpg', 1000, '', '2020-05-12'),
(10, 52, '', 'designoweb ', 'infrastructure ', '5', 400, '407956752.jpg', 997, '', '2020-05-13'),
(11, 52, '', 'designoweb ', 'infrastructure ', '5', 400, '750987540.jpg', 997, '', '2020-05-13'),
(12, 54, '', 'AIRCONS TO ADMIRE ', 'ELECTRICAL FIXING', '8years ', 1500, '1699585600.jpg', 1000, '', '2020-05-13'),
(13, 62, '1450326510.jpeg', 'Blackbird', 'Installation of finishers on modern home', 'apartments in and around Durban', 500, '2063980219.jpeg', 1000, '', '2020-05-14'),
(14, 73, '', 'Ajim Projects ', 'Decking and Pergola installations ', '25 years ', 250, '1377506555.jpg', 1000, '', '2020-05-14'),
(15, 74, '1004042602.jpeg', 'Krudos Construction ', 'Complete Construction and  Renovation Services', '20 years experience', 8000, '1276121146.jpeg', 1000, '', '2020-05-14'),
(16, 75, '', 'Potentia Projects', 'D', 'D', 0, '1070340925.jpg', 1000, '', '2020-05-14'),
(17, 80, '926478540.jpeg', 'EIP Construction ', 'Construction & Project Management, Quantity Surveying, Commercial, Residential.', '12 Years', 0, '112565268.jpeg', 1000, 'www.eipconstruction.co.za', '2020-05-15'),
(18, 82, '937461428.jpeg', 'Speciality Waterproof & Roof', 'Residential and Commercial ', '15 Years experience working  and specifying for leading international coating companies. ', 0, '1836871075.jpeg', 1000, 'www.waterproofmyroof.co.za', '2020-05-15'),
(19, 84, '1871494829.jpeg', 'RCE', 'Building, Renovations, Alterations & Maintenance ', '25 years experience ', 0, '2113335433.jpeg', 1000, 'www.rceng.co.za', '2020-05-16'),
(20, 97, '', 'Skyview Structures', 'Waterproofing Specialist, Galvanised Steel Storage Water Tanks,Swimming Pool Specialist,  Epoxy Flooring', 'Over 20 years', 1000, '695017410.jpg', 1000, 'www.skyviewstructures.co.za ', '2020-05-18'),
(21, 99, '', 'GO Maintenance ', 'All', 'SuperSpar Group. Absa Bank ', 10, '234023838.jpg', 1000, 'www.gomaintenance.co.za', '2020-05-18'),
(22, 43, '', 'Viridicon ', '10 years in the built environment ', '10 years', 10500, '1726455324.jpg', 1000, 'wwwviridicon.co.za', '2020-05-18'),
(23, 109, '486442211.jpeg', 'Testing ', 'Test', 'yes', 20, '1097156823.jpeg', 999, 'Testing.com', '2020-05-22'),
(24, 110, '117028144.jpeg', 'Construct Me', 'Civil Engineering ', '10', 1500, '15062616.jpeg', 1000, 'www.thebuilingcomapny.co.za', '2020-05-22'),
(25, 121, '757289383.jpg', 'The Plumbing Company and Green Energy Solutions', 'Plumbing, Solar, Heatpumps, Jetting and Camera Inspections', 'Plumbing', 450, '42847887.jpg', 1000, 'www.tpcplumbing.co.za', '2020-06-04'),
(26, 121, '123686898.jpg', 'The Plumbing Company and Green Energy Solutions', 'Plumbing, Solar, Heatpumps, Jetting and Camera Inspections', 'Plumbing', 450, '916648346.jpg', 1000, 'www.tpcplumbing.co.za', '2020-06-04'),
(27, 122, '', 'Arrano Partitions & Ceilings', 'Capable of any size or type of project in the Ceiling and Partition sector of Construction', 'We are registered as a company from 2016 although we have been in business for 13 years. We do work for commercial clients like BMW, Imperial Logistics, VW, Menlyn, Sourcelink, etc.', 240, '31139904.jpg', 1000, 'www.arranospaces.co.za', '2020-06-07'),
(28, 125, '2125856099.jpeg', 'Test', 'Test', 'test', 65, '1026471477.jpeg', 1000, 'Test', '2020-06-29'),
(29, 33, '', 'Designoweb', 'Specialists in Wooden work', '1-2years', 5000, '783575208.jpg', 1000, 'www.designoweb@gmail.com', '2020-06-22'),
(30, 127, '', 'sahil', 'build r', '12 years', 5044, '1120527963.jpg', 1000, 'www.googlw.cl', '2020-06-22'),
(31, 128, '', 'www.googke.com', 'builder', '12', 158, '2033643728.jpg', 1000, 'www.google.do', '2020-07-21'),
(32, 130, '1616381218.jpg', 'designoweb ', 'flooring ', '6', 50000, '1577906251.jpg', 1000, '', '2020-06-26'),
(33, 135, '631378245.jpeg', 'DW', 'Everything  Ejlefj Asoka;so. Alan’s Aden pass a wipe. sad wrqouwr d slow o add wow add Ali dead oawrua d ask daw era d sou’westers Dias a few fqpwj would as Papuan Dallas douse qalj Paul pied qapsudqw Dow f quad ', 'Loren Ipsam Loren Ipsam. Loren Ipsam. Loren Ipsam Loren Ipsam Loren Ipsam.    Loren Ipsam Loren Ipsam Loren Ipsam Loren Ipsam Loren Ipsam Loren Ipsam Loren Ipsam Loren Ipsam', 1800, '626972677.jpeg', 1000, 'www.dw.com', '2020-07-06'),
(34, 137, '253888878.jpeg', 'My Test Company Name ', 'None', 'none', 0, '616805293.jpeg', 1000, 'Test.com', '2020-07-01'),
(35, 141, '1445954497.jpeg', 'DW', 'All', '14', 1400, '86881215.jpeg', 999, 'www.dw.com', '2020-07-21'),
(36, 146, '', 'viridicon ', 'test', '10 days', 10000, '1497158176.jpg', 1000, 'www.viridicon.co.za', '2020-07-21'),
(37, 147, '', 'Designoweb', 'Work', '1', 1200, '223011128.jpg', 1000, 'designoweb.com', '2020-07-21'),
(38, 148, '', 'design', 'labout', '12', 1500, '1529935176.jpg', 1000, 'www.google.com', '2020-07-21'),
(39, 150, '', 'designoweb', 'test', '1', 1200, '111186124.jpg', 1000, 'designoweb.com', '2020-07-21'),
(40, 151, '', 'designoweb ', 'concrete mix ', '1', 10000, '323008637.jpg', 1000, '', '2020-07-21'),
(41, 152, '', 'dw', 'test', '1', 1200, '1113056273.jpg', 1000, 'dw.com', '2020-07-21'),
(42, 153, '', 'designoweb ', 'concrete ', '1', 1000, '704107435.jpg', 1000, '', '2020-07-21'),
(43, 162, '620206982.jpg', 'TransAfrica ', 'telecommunications ', '15years', 12, '1366470266.jpg', 1000, 'gnorthprojects@gmail.com', '2020-08-15'),
(44, 163, '', 'Freshly Made', 'building', 'exp1', 1000, '539919694.jpg', 998, 'www.freshlymade.co.za', '2020-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `contractor_equipment_contact`
--

CREATE TABLE `contractor_equipment_contact` (
  `id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `response` enum('','0','1') NOT NULL,
  `time` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contractor_labour_contact`
--

CREATE TABLE `contractor_labour_contact` (
  `id` int(11) NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `labour_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `response` enum('0','1','') NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contractor_material_contact`
--

CREATE TABLE `contractor_material_contact` (
  `id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `response` enum('','0','1') NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractor_material_contact`
--

INSERT INTO `contractor_material_contact` (`id`, `market_user_id`, `material_id`, `title`, `description`, `location_id`, `response`, `time`) VALUES
(1, 88, 81, 'WATERPROOFING SPECIALIST ', 'Roof Leaks, Basements,  Damp Proofing, Galvanised Steel Water tanks, Swimming Pools, Epoxy Flooring', 5, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contractor_post`
--

CREATE TABLE `contractor_post` (
  `id` int(11) NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact_type` enum('equipment','material','','') NOT NULL,
  `type` enum('rent','sell','','') NOT NULL,
  `status` int(11) NOT NULL,
  `per_day` int(11) NOT NULL,
  `per_month` int(11) NOT NULL,
  `from_hour` varchar(255) NOT NULL,
  `to_hour` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `response` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contractor_sc_contact`
--

CREATE TABLE `contractor_sc_contact` (
  `contractor_sc_contact_id` int(11) NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `sub_contractor_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `plot_area` varchar(255) NOT NULL,
  `built` varchar(255) NOT NULL,
  `cost_to` int(11) NOT NULL,
  `cost_from` int(11) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `quality` enum('low','medium','high','') NOT NULL,
  `description` text NOT NULL,
  `response` enum('0','1','') NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractor_sc_contact`
--

INSERT INTO `contractor_sc_contact` (`contractor_sc_contact_id`, `contractor_id`, `sub_contractor_id`, `title`, `location_id`, `plot_area`, `built`, `cost_to`, `cost_from`, `start_date`, `end_date`, `quality`, `description`, `response`, `time`) VALUES
(1, 43, 13, 'New wall', 5, '1350', '70', 150, 100, '2020-5-24', '2020-5-30', 'medium', 'Test ', '', '2020-05-19'),
(2, 12, 124, 'Remedy Hunter System', 5, '1500', '1000', 2, 1, '2020-6-29', '2020-6-30', 'high', 'Need a service of my sprinklers. please contact ', '', '2020-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `contractor_sc_contact_images`
--

CREATE TABLE `contractor_sc_contact_images` (
  `id` int(11) NOT NULL,
  `contractor_sc_contact_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractor_sc_contact_images`
--

INSERT INTO `contractor_sc_contact_images` (`id`, `contractor_sc_contact_id`, `images`) VALUES
(1, 1, '34268.jpg'),
(2, 2, '17066.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `faq`) VALUES
(17, 'What is BuildApp Markeplace?'),
(19, 'Build App');

-- --------------------------------------------------------

--
-- Table structure for table `faq_desc`
--

CREATE TABLE `faq_desc` (
  `faq_desc_id` int(11) NOT NULL,
  `faq_id` int(11) NOT NULL,
  `faq_desc` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq_desc`
--

INSERT INTO `faq_desc` (`faq_desc_id`, `faq_id`, `faq_desc`) VALUES
(1, 4, 'desc1'),
(2, 4, 'desc2'),
(5, 4, 'sdf'),
(6, 6, 'sdfsdas'),
(7, 7, 'xcxc'),
(8, 9, 'App'),
(9, 10, 'asd'),
(10, 12, 'App'),
(11, 12, 'App'),
(12, 12, 'App'),
(13, 12, 'App'),
(14, 12, 'App'),
(15, 13, 'App'),
(16, 13, 'Test'),
(17, 17, 'https://youtu.be/21lWNg6wqGk'),
(18, 17, 'https://youtu.be/oRP4OmlQBDw'),
(19, 17, 'BuildApp Marketplace is a platform that connects building professionals with private individuals requiring building services.  Users of the app can either register as a building contractor, a specialized subcontractor, a labourer, or a materials/equipment'),
(20, 19, 'Build App'),
(21, 19, 'Build App'),
(22, 19, '<p><b>Build App is very usefull Application</b></p>');

-- --------------------------------------------------------

--
-- Table structure for table `labour_details`
--

CREATE TABLE `labour_details` (
  `labour_detail_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `wages` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `job_status` enum('Available','Not available') NOT NULL DEFAULT 'Available'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labour_details`
--

INSERT INTO `labour_details` (`labour_detail_id`, `market_user_id`, `image`, `wages`, `time`, `job_status`) VALUES
(1, 112, '', 0, '2020-05-23', 'Available'),
(2, 112, '', 0, '2020-05-23', 'Available'),
(3, 113, '', 6500, '2020-05-23', 'Available'),
(4, 119, '158178064.jpg', 20000, '2020-06-03', 'Available'),
(5, 132, '1147910363.jpg', 1000, '2020-06-26', 'Available'),
(6, 132, '1147910363.jpg', 1000, '2020-06-26', 'Available'),
(7, 133, '2043697099.jpg', 500, '2020-06-26', 'Available'),
(8, 133, '2043697099.jpg', 500, '2020-06-26', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `labour_details_image`
--

CREATE TABLE `labour_details_image` (
  `id` int(11) NOT NULL,
  `labour_detail_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labour_details_image`
--

INSERT INTO `labour_details_image` (`id`, `labour_detail_id`, `images`) VALUES
(1, 1, '78892.jpg'),
(2, 2, '30743.jpg'),
(3, 3, '35397.jpg'),
(4, 4, '58136.jpg'),
(5, 4, '20327.jpg'),
(6, 4, '89949.jpg'),
(7, 4, '77827.jpg'),
(34, 5, '17891.jpg'),
(33, 5, '88360.jpg'),
(32, 5, '58868.jpg'),
(11, 6, '75389.jpg'),
(12, 6, '42451.jpg'),
(13, 6, '15883.jpg'),
(23, 7, '96659.jpg'),
(15, 8, '14626.jpg'),
(22, 7, '81749.jpg'),
(21, 7, '37084.jpg'),
(24, 7, '68790.jpg'),
(31, 5, '58343.jpg'),
(30, 5, '68668.jpg'),
(35, 5, '48616.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `labour_post`
--

CREATE TABLE `labour_post` (
  `labour_post_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `aoi_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `wages` varchar(12) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labour_post`
--

INSERT INTO `labour_post` (`labour_post_id`, `market_user_id`, `title`, `aoi_id`, `skill_id`, `location_id`, `wages`, `time`) VALUES
(2, 2, 'sdsdfsdfff', 2, 2, 2, '123', '2020-02-05'),
(9, 120, 'sssjjkjj', 3, 2, 1, '2480', '2020-01-27'),
(10, 58, 'hbnnn', 6, 4, 5, '500', '2020-01-27'),
(11, 92, 'test', 4, 0, 2, '500', '2020-01-27'),
(12, 120, 'usjrjrjrjr', 10, 3, 6, '5050', '2020-01-27'),
(13, 8, 'build', 10, 4, 4, '250', '2020-01-30'),
(14, 8, 'building home', 20, 4, 4, '25', '2020-01-30'),
(16, 8, 'labor project', 3, 0, 1, '123', '2020-02-03'),
(17, 2, 'project123', 1, 0, 3, '123', '2020-02-03'),
(18, 2, 'power', 6, 0, 4, '1233', '2020-02-04'),
(19, 2, 'why eye', 1, 0, 1, '123', '2020-02-04'),
(20, 2, 'rohan test', 2, 2, 2, '100', '2020-02-05'),
(21, 2, 'asd', 1, 3, 1, '123', '2020-02-05'),
(22, 2, 'qqqqqqqqqqqq', 1, 3, 1, '123', '2020-02-04'),
(23, 2, 'Construction', 5, 4, 26, '500', '2020-02-05'),
(24, 2, 'test', 4, 3, 2, '200', '2020-02-05'),
(25, 2, 'te', 2, 3, 60, '400', '2020-02-06'),
(26, 2, 'DesignOweb technologies', 1, 2, 2, '80', '2020-02-13'),
(28, 83, 'Wall construction', 4, 1, 65, '5000', '2020-02-20'),
(29, 83, 'Home construction', 2, 2, 66, '8000', '2020-02-20'),
(30, 21, 'bss', 2, 3, 4, '6464', '2020-02-20'),
(31, 21, 'bsd', 3, 3, 3, '97', '2020-02-20'),
(32, 71, 'nclp', 7, 3, 6, '2000', '2020-02-27'),
(34, 71, 'mlep', 11, 3, 9, '2000', '2020-02-27'),
(35, 71, 'tttttt', 20, 2, 7, '25000', '2020-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `labour_post_images`
--

CREATE TABLE `labour_post_images` (
  `id` int(11) NOT NULL,
  `labour_post_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labour_post_images`
--

INSERT INTO `labour_post_images` (`id`, `labour_post_id`, `images`) VALUES
(20, 10, '63316.jpg'),
(45, 17, '44206.jpeg'),
(28, 9, '45628.jpg'),
(21, 11, '28595.jpeg'),
(22, 11, '66270.jpeg'),
(44, 16, '96379.jpeg'),
(30, 12, '51541.jpg'),
(31, 13, '91093.jpg'),
(32, 14, '93635.jpg'),
(33, 15, '29659.jpg'),
(61, 2, '68221.jpg'),
(60, 2, '39556.jpg'),
(46, 18, '56989.jpeg'),
(47, 19, '22066.jpeg'),
(58, 20, '27032.jpg'),
(57, 20, '60987.jpg'),
(59, 21, '24527.jpg'),
(51, 22, '90936.jpeg'),
(52, 23, '30037.jpg'),
(54, 24, '33226.jpg'),
(62, 2, '38003.jpg'),
(63, 2, '29771.jpg'),
(65, 25, '27948.jpg'),
(66, 26, '54498.jpeg'),
(67, 26, '84720.jpeg'),
(70, 28, '11470.jpg'),
(71, 28, '28201.jpg'),
(72, 28, '99741.jpg'),
(73, 29, '59529.jpg'),
(74, 30, '74313.jpg'),
(75, 30, 'Screenshot_2020-01-09-15-43-53-501_com_sahil_petbae.png'),
(76, 31, '86687.jpg'),
(77, 31, '97546.jpg'),
(78, 31, '95520.jpg'),
(79, 32, '90841.jpg'),
(80, 32, '22261.jpg'),
(84, 34, '60251.jpg'),
(83, 34, '20652.jpg'),
(85, 35, '40974.jpg'),
(86, 35, '64046.jpg'),
(87, 35, '90684.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location`) VALUES
(1, 'Johannesburg'),
(2, 'Cape Town'),
(3, 'Benoni'),
(4, 'Durban'),
(5, 'Pretoria'),
(6, 'Vereeniging'),
(7, 'Port Elizabeth'),
(8, 'Pietermaritzburg'),
(9, 'Bloemfontein'),
(10, 'Welkom'),
(11, 'Nelspruit'),
(12, 'East London'),
(13, 'Thohoyandou'),
(14, 'Springs'),
(15, 'Uitenhage'),
(16, 'Polokwane'),
(17, 'Paarl'),
(18, 'Klerksdorp'),
(19, 'George'),
(20, 'Rustenburg'),
(21, 'Kimberley'),
(22, 'Bhisho'),
(23, 'Middelburg'),
(24, 'Vryheid'),
(25, 'Umtata'),
(26, 'Worcester'),
(27, 'Potchefstroom'),
(28, 'Brits'),
(29, 'Queenstown'),
(30, 'Mmabatho'),
(31, 'Kroonstad'),
(32, 'Bethal'),
(33, 'Grahamstown'),
(34, 'Bethlehem'),
(35, 'Oudtshoorn'),
(36, 'Standerton'),
(37, 'Upington'),
(38, 'Saldanha'),
(39, 'Tzaneen'),
(40, 'Knysna'),
(41, 'Graaff-Reinet'),
(42, 'Port Shepstone'),
(43, 'Vryburg'),
(44, 'Ladysmith'),
(45, 'Beaufort West'),
(46, 'Aliwal North'),
(47, 'Volksrust'),
(48, 'Lebowakgomo'),
(49, 'Cradock'),
(50, 'De Aar'),
(51, 'Hermanus'),
(52, 'Ulundi'),
(53, 'Komatipoort'),
(54, 'Messina'),
(55, 'Middelburg'),
(56, 'Port Alfred'),
(57, 'Bloemhof'),
(58, 'Mossel Bay'),
(59, 'Bredasdorp'),
(60, 'Swellendam'),
(61, 'Colesberg'),
(62, 'Brandfort'),
(63, 'Prieska'),
(64, 'Springbok'),
(65, 'Kuruman'),
(66, 'Port Saint John'),
(67, 'Carnarvon'),
(68, 'Pofadder'),
(69, 'Vanrhynsdorp'),
(70, 'Alexander Bay'),
(71, 'Ubombo'),
(72, 'Mahikeng');

-- --------------------------------------------------------

--
-- Table structure for table `marketplace`
--

CREATE TABLE `marketplace` (
  `market_user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` enum('user','contractor','sub_contractor','labour','equipment','material','supplier') DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `time` varchar(255) NOT NULL,
  `plan_type` enum('Basic','Professional') NOT NULL DEFAULT 'Professional'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketplace`
--

INSERT INTO `marketplace` (`market_user_id`, `name`, `email`, `phone`, `password`, `type`, `status`, `time`, `plan_type`) VALUES
(40, 'Thinus Paterson', 'loftyblue@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(41, 'Nathan ', 'info@triconairconditioning.co.za', '0828397911', 'NathanTsakos123', 'contractor', 1, '2020-05-12', 'Professional'),
(3, 'SC', 'ankit2.designoweb@gmail.com', '9988776655', '123456', 'sub_contractor', 1, '2020-03-27', 'Professional'),
(4, 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-00@cloudtestlabaccounts.com', 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-00@cloudtestlabaccounts.com', NULL, NULL, NULL, 1, '', 'Professional'),
(5, 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-09@cloudtestlabaccounts.com', 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-09@cloudtestlabaccounts.com', NULL, NULL, NULL, 1, '', 'Professional'),
(6, 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-01@cloudtestlabaccounts.com', 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-01@cloudtestlabaccounts.com', NULL, NULL, NULL, 1, '', 'Professional'),
(7, 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-02@cloudtestlabaccounts.com', 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-02@cloudtestlabaccounts.com', NULL, NULL, NULL, 1, '', 'Professional'),
(8, 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-03@cloudtestlabaccounts.com', 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-03@cloudtestlabaccounts.com', NULL, NULL, NULL, 1, '', 'Professional'),
(9, 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-04@cloudtestlabaccounts.com', 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-04@cloudtestlabaccounts.com', NULL, NULL, NULL, 1, '', 'Professional'),
(10, 'Nuage Laboratoire', 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-05@cloudtestlabaccounts.com', NULL, NULL, NULL, 1, '', 'Professional'),
(11, 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-06@cloudtestlabaccounts.com', 'WGUNJZM2NGI5PJEQ5FD6AN3IKQ-06@cloudtestlabaccounts.com', NULL, NULL, NULL, 1, '', 'Professional'),
(12, 'Byron Fergusson ', 'byron@viridicon.co.za', '0829305253', 'letmein', 'contractor', 1, '2020-03-29', 'Professional'),
(13, 'Vcon Floors', 'info@viridicon.co.za', '0742170000', 'letmein', 'sub_contractor', 1, '2020-03-29', 'Professional'),
(14, 'Byron Labour ', 'byronfergusson@gmail.com', '0742170000', 'letmein', NULL, 1, '2020-03-30', 'Professional'),
(15, 'Terrence ', 'terrence@tcbgreenenergy.co.za', '0825658070', 'Carter@6762', NULL, 1, '2020-03-30', 'Professional'),
(16, 'Raymond Page', 'info@alunitepta.co.za', '0722261460', '123456', 'contractor', 1, '2020-03-30', 'Professional'),
(17, 'Byron Conway', 'byron@inovar.co.za', '0846088727', 'Leeds3914!', NULL, 1, '2020-03-30', 'Professional'),
(18, 'Carinus', 'carinus@iservit.co.za', '0825750776', 'Prado2020', NULL, 1, '2020-03-31', 'Professional'),
(19, 'Adriaan ', 'anelco.projects@gmail.com', '0814976105', 'Diane17#', 'contractor', 1, '2020-03-31', 'Professional'),
(20, 'Rainflow sa', 'sales@rainflowsa.co.za', '0614988817', '531RssA#', NULL, 1, '2020-03-31', 'Professional'),
(21, 'Jason Cole-Niven', 'jasontassgroup@gmail.com', NULL, NULL, 'supplier', 1, '', 'Professional'),
(22, 'Shaun ', 'Shaun@tpcplumbing.co.za', '0843353785', 'Leanne25', NULL, 1, '2020-04-01', 'Professional'),
(23, 'Shaun ', 'Shaun@tpcplumbing.co.za', '0843353785', 'Leanne25', NULL, 1, '2020-04-01', 'Professional'),
(24, 'Shaun ', 'Shaun@tpcplumbing.co.za', '0843353785', 'Leanne25', NULL, 1, '2020-04-01', 'Professional'),
(25, 'Shaun ', 'Shaun@tpcplumbing.co.za', '0843353785', 'Leanne25', NULL, 1, '2020-04-01', 'Professional'),
(26, 'Shubham Gupta', 'shubham.designoweb@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(27, 'Tjaart Viljoen', 'tjaart@noetic.co.za', '0823897681', 'C3rnun0s', NULL, 1, '2020-04-07', 'Professional'),
(28, 'Shazer Ap', 'shazer.ap@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(29, 'Charl', 'charl.fourie7@gmail.com', '0832966764', 'FourieCharl7', NULL, 1, '2020-04-13', 'Professional'),
(30, 'rotem cohen', 'rotmika.cohen@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(31, 'Hila Yosef', 'hilayosef1234@walla.com', NULL, NULL, NULL, 1, '', 'Professional'),
(32, 'Shawn Smith', 'smithsflooringllc@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(33, 'Rohan Kumar', 'yoyorohanpunjabi@gmail.com', NULL, NULL, 'contractor', 1, '', 'Professional'),
(34, 'sahil', 'sahilkumardesignoweb@gmail.com', '84447094664', '123456', 'contractor', 1, '2020-04-15', 'Professional'),
(35, 'Rohan Kumar', 'rrohan97@yahoo.com', NULL, NULL, NULL, 1, '', 'Professional'),
(36, 'bhawna', 'bhawna.designoweb@gmail.com', '8923587509', '123456', 'contractor', 1, '2020-04-20', 'Professional'),
(37, 'Richard Hammond', 'kwagyeneiks@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(38, '????? ???????', 'mctolengit.03@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(39, 'Brian Nell', 'nell.brian1@gmail.com', NULL, NULL, 'supplier', 1, '', 'Professional'),
(42, 'Brenden de Klerk', 'ecoleaf46@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(43, 'Dirk Kotze', 'dirkkotze505@gmail.com', NULL, NULL, 'contractor', 1, '', 'Professional'),
(44, 'Brando Drepaniotis', 'stav.drep@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(45, 'Rukesh Raghubir ', 'rukesh.r@mdconstruction.co.za', '0837883979', 'Avikaarkr@8410#', NULL, 1, '2020-05-12', 'Professional'),
(46, 'Chris Slater', 'chris@fenceworks.co.za', NULL, NULL, NULL, 1, '', 'Professional'),
(47, 'James ', 'jtsvangira@gmail.com', '0633303352', '0633303352', 'supplier', 1, '2020-05-12', 'Professional'),
(48, 'Tendani ', 'Africanspearc@gmail.com', '0832107147', 'ten20077', 'contractor', 1, '2020-05-12', 'Professional'),
(49, 'Nomvula Nogwaja', 'nogwajam9@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(50, 'Mobeen Docrat', 'mobeendocrat@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(51, 'Michael', 'michael@aquamat.co.za', '0722255087', 'Aquamat20', NULL, 1, '2020-05-13', 'Professional'),
(52, 'test ', 'test@gmail.com', '+918923587509', '123456', 'contractor', 1, '2020-05-13', 'Professional'),
(53, 'Munyaradzi Grant Jambwa', 'jambwa3@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(54, 'Admire Mazivamhandu', 'mhandudylan@gmail.com', NULL, NULL, 'contractor', 1, '', 'Professional'),
(55, 'Brenden de klerk', 'brenden@zerofootprint.co.za', '0828655581', 'Brenden@1987', 'supplier', 1, '2020-05-13', 'Professional'),
(56, 'Moloko Huma', 'humav@rocketmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(57, 'Nick', 'painteqprentals@gmail.com', '0718800683', '26@Brummer', NULL, 1, '2020-05-13', 'Professional'),
(58, 'Etienne Smit', 'Etiennesmit.es@gmail.com', '0739950906', 'baTkj-F.Tqsi', NULL, 1, '2020-05-13', 'Professional'),
(59, 'Sobahle Mahlobo Ntombela', 'mbusisenie@gmail.com', NULL, NULL, 'supplier', 1, '', 'Professional'),
(60, 'Sporo Sentane', 'sporosentane@gmail.com', '+27676292501', 'Qhawe@2018', NULL, 1, '2020-05-13', 'Professional'),
(61, 'Mohammed Vahed', 'mohammed.vahed@hotmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(62, 'Trishen ', 't.chotoo@gmail.com', '0715415084', 'pilot101', 'contractor', 1, '2020-05-14', 'Professional'),
(63, 'Andre', 'swandre.nel@gmail.com', '0794967925', 'A*860423a', NULL, 1, '2020-05-14', 'Professional'),
(64, 'William', 'williamd@treasuryone.co.za', '0718734285', 'Monday@01', NULL, 1, '2020-05-14', 'Professional'),
(65, 'Shilboy Shilly Bopape', 'ssbopape@yahoo.com', NULL, NULL, NULL, 1, '', 'Professional'),
(66, 'Mongezi Latso Letshaba', 'latso20@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(67, 'Majdie ', 'gamieldien.majdie@gmail.com', '0717919782', 'Nurhanama280920', NULL, 1, '2020-05-14', 'Professional'),
(68, 'Raj', 'rajp@narasimhapro.co.za', '0671732070', 'Chahel2008', 'supplier', 1, '2020-05-14', 'Professional'),
(69, 'Vice Xolani Ngomane', 'ngomaneboss@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(70, 'Shaun Barnes', 'shaunbarnes@mweb.co.za', NULL, NULL, NULL, 1, '', 'Professional'),
(71, 'Alki', 'alki@anastassiou.info', '0761889180', 'Calculator911', NULL, 1, '2020-05-14', 'Professional'),
(72, 'Fanele', 'faneled@gmail.com', '0784691298', 'Fanedlams87', NULL, 1, '2020-05-14', 'Professional'),
(73, 'Alton Mitchell', 'heavenonearthkingdomministries@gmail.com', NULL, NULL, 'contractor', 1, '', 'Professional'),
(74, 'Louis Kruger', 'krudos.construction@outlook.com', '0827118718', 'Krudos@2020', 'contractor', 1, '2020-05-14', 'Professional'),
(75, 'Dewald Lombard', 'dewaldlombard@yahoo.com', NULL, NULL, 'contractor', 1, '', 'Professional'),
(76, 'Rudi Van der westhuizen', 'vrudi252@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(77, 'Leli OkaPhakathwayo', 'mdmakhanya@webmail.co.za', NULL, NULL, NULL, 1, '', 'Professional'),
(78, 'George De Klerk', 'gdk@telkomsa.net', NULL, NULL, NULL, 1, '', 'Professional'),
(79, 'Charle', 'charleboloka@gmail.com', '0817605502', '3226juju', NULL, 1, '2020-05-15', 'Professional'),
(80, 'Gavin Engelbrecht', 'gavin@eipconstruction.co.za', '0834586886', 'GavinEng6', 'contractor', 1, '2020-05-15', 'Professional'),
(81, 'Kyle Windvogel', 'wind.kyle@gmail.com', NULL, NULL, 'supplier', 1, '', 'Professional'),
(82, 'Pieter Craucamp ', 'info@waterproofmyroof.co.za', '0743486420', 'AlfaBravo85', 'contractor', 1, '2020-05-15', 'Professional'),
(83, 'Christopher Curt Ward', 'chrisw13@mobileemail.vodafonesa.co.za', NULL, NULL, NULL, 1, '', 'Professional'),
(84, 'Victor Rodrigues', 'info@rceng.co.za', '0832299921', '#RCE2001', 'contractor', 1, '2020-05-16', 'Professional'),
(85, 'Severina Chawu', 'severinachawu@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(86, 'Mokgotla', 'mokgotlamawasha@gmail.com', '0769250321', 'M@kgotl9', NULL, 1, '2020-05-16', 'Professional'),
(87, 'Tanasi Goba', 'tanasigoba0@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(97, 'Buildteki Buildteki', 'buildteki@yahoo.com', NULL, NULL, 'contractor', 1, '', 'Professional'),
(89, 'Charles Raw', 'charlraw@gmail.com', '0748274455', 'Pynyfruja1356nr!', 'supplier', 1, '2020-05-16', 'Professional'),
(90, 'allan smith', 'premscaff@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(91, 'KSJ Installations', 'kevin@ksjsa.co.za', '0814356964', 'Thunder54121', 'supplier', 1, '2020-05-17', 'Professional'),
(92, 'Dewan Mostert', 'dewan@bouwend.co.za', '0731478475', 'obelix9652', NULL, 1, '2020-05-17', 'Professional'),
(93, 'Francois', 'valuepaving@lantic.net', '0828214091', 'Sep@2016', NULL, 1, '2020-05-17', 'Professional'),
(94, 'Christopher Griffiths', '104griffiths@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(95, 'Serame Masigo ', 'srmasigo@gmail.com', '0720569562', '@Masigo94', NULL, 1, '2020-05-17', 'Professional'),
(96, 'Cherise', 'cherise@zabicon.co.za', '0636972158', 'zabicon2013', NULL, 1, '2020-05-17', 'Professional'),
(98, 'Jennifer ', 'Jennifer@viridicon.co.za', '0825896385', '123456', NULL, 1, '2020-05-18', 'Professional'),
(99, 'Graham Openshaw', '0832286812@mtnloaded.co.za', NULL, NULL, 'contractor', 1, '', 'Professional'),
(100, 'Ntando Eben Mbhele', 'embhele@gmail.com', NULL, NULL, 'supplier', 1, '', 'Professional'),
(101, 'Eugene Stephenson ', 'eugene@wbs.co.za', '0824915020', 'HDcvo2015', 'supplier', 1, '2020-05-18', 'Professional'),
(102, 'Kevin Mullen', 'kevin.mullen31@yahoo.com', '2523672822', 'Martinez300', NULL, 1, '2020-05-18', 'Professional'),
(103, 'Alan Nortje', 'alan@voidcon.co.za', '0662557913', 'VoidCon', 'supplier', 1, '2020-05-19', 'Professional'),
(104, 'Paintoria', 'sales@paintoria.co.za', '0834501168', 'Paintoria@2020', 'sub_contractor', 1, '2020-05-19', 'Professional'),
(105, 'Graham ', 'graham@adcopconsulting.com', '+27794963736', 'AdCop20$', NULL, 1, '2020-05-19', 'Professional'),
(118, 'Jacob Mhlanga', 'jacobmhlanga89@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(107, 'Mark', 'marks@tfsmail.co.za', '0828882276', 'Sewil67', NULL, 1, '2020-05-19', 'Professional'),
(108, 'Clinton', 'clinton_viljoen@hotmail.com', '0824907283', 'Quicksilver1', NULL, 1, '2020-05-20', 'Professional'),
(109, 'David', 'davidjbrauer+test@gmail.com', '0823183245', 'thisislocked', 'contractor', 1, '2020-05-22', 'Professional'),
(110, 'Scott Whiteley ', 'scott@blott.io', '0849992121', '1925Monica15', 'contractor', 1, '2020-05-22', 'Professional'),
(111, 'Yhovanna Corea', 'yovanitacorea@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(112, 'Denzel Jambwa', 'jambwa44@gmail.com', NULL, NULL, 'labour', 1, '', 'Professional'),
(113, 'Nkhupetsene Ramokgopa', 'lephophi@gmail.com', '0765755771', '632373', 'labour', 1, '2020-05-23', 'Professional'),
(114, '????? ??????', 'noabuchr@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(115, 'Clive Pillay', 'designerwater111@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(116, 'Watcharin ', 'watcharin.mfw@gmail.com', '0650989944', '25292529+pui', NULL, 1, '2020-05-25', 'Professional'),
(117, 'Cosmin Petcu', 'cosmin.bebe21@yahoo.com', NULL, NULL, NULL, 1, '', 'Professional'),
(119, 'Kirsten Luther', 'kirstenluther2@gmail.com', NULL, NULL, 'labour', 1, '', 'Professional'),
(120, 'Gert', 'gjcolivier@hotmail.com', '0450536825', 'Saints11', NULL, 1, '2020-06-03', 'Professional'),
(121, 'The Plumbing Company', 'admin1@tpcplumbing.co.za', '0765216444', 'Admin@321', 'contractor', 1, '2020-06-04', 'Professional'),
(122, 'Arnoldt Steyn ', 'arnoldt@arrano.co.za', '0761341523', 'Arno890412', 'contractor', 1, '2020-06-07', 'Professional'),
(123, 'Isbal Jonny', 'geogatedproject290@gmail.com', NULL, NULL, 'supplier', 1, '', 'Professional'),
(124, 'Helge Roux', 'helgeroux@icloud.com', '0827725210', 'clivia1827', 'sub_contractor', 1, '2020-06-13', 'Professional'),
(125, 'Test Cont', 'davidjbrauer+2@gmail.com', '0823183255', 'qwerty', 'contractor', 1, '2020-06-17', 'Professional'),
(126, 'Colette', 'colette.fergusson@gmail.com', '0832972672', 'bcol86', NULL, 1, '2020-06-20', 'Professional'),
(127, 'Sahil Kumar', 'sahil.kumardesignoweb@gmail.com', NULL, NULL, 'contractor', 1, '', 'Professional'),
(128, 'sahil', 'sahilvarshney66@gmail.com', '84471904967', '123456', 'contractor', 1, '2020-06-22', 'Professional'),
(129, 'Robert', 'lyleste@Robert.gmai.com', '0736618473', 'Robertndlovu', 'sub_contractor', 1, '2020-06-23', 'Professional'),
(130, 'test', 'testcon@gmail.com', '8923587509', '123456', 'contractor', 1, '2020-06-24', 'Professional'),
(131, 'sbns', 'nznz@gma.xo', '84479104946', '123456', NULL, 1, '2020-06-24', 'Professional'),
(132, 'Vibhuti', 'vibhuti.designoweb@gmail.com', '8521478563', '123456', 'labour', 1, '2020-06-26', 'Professional'),
(133, 'labour', 'testlab@gmail.com', '8923587509', '123456', 'labour', 1, '2020-06-26', 'Professional'),
(134, 'Test', 'tester@gmail.com', '0822222222', 'letmein', NULL, 1, '2020-06-26', 'Professional'),
(135, 'Raj', 'raj@gmail.com', '8750996369', 'qqqqqq', 'contractor', 1, '2020-06-30', 'Professional'),
(136, 'Raj Supplier', 'raj+1@gmail.com', '8769663872', 'qqqqqq', 'supplier', 1, '2020-06-30', 'Professional'),
(137, 'David Contractor', 'davidjbrauer+cont@gmail.com', '0823183245', 'locked12', 'contractor', 1, '2020-07-01', 'Professional'),
(138, 'David Year ', 'davidjbrauer+12@gmail.com', '8823183245', 'locked1', 'supplier', 1, '2020-07-01', 'Professional'),
(139, 'Ritam bhardwaj', 'jaykishan639371@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(140, 'Benjamin Brauer', 'bzbrauer@gmail.com', NULL, '132518', 'supplier', 1, '', 'Professional'),
(141, 'Saurabh Chandra Bose', 'saurabh.designoweb@gmail.com', NULL, NULL, 'contractor', 1, '', 'Professional'),
(142, 'Saurabh ChandraBose', 'mmk46zx75w@privaterelay.appleid.com', NULL, NULL, NULL, 1, '', 'Professional'),
(143, 'Jane', 'info@teacherjane.co.za', '0827709613', 'Watchfully1', NULL, 1, '2020-07-13', 'Professional'),
(144, 'Carrie Kesson', 'carrie@betterbunting.co.za', NULL, NULL, NULL, 1, '', 'Professional'),
(145, 'Dirk Kotze', 'dirk_kotze1@hotmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(146, 'Dirk Kotze', 'dirk@viridicon.co.za', '0848440007', 'bn70zsgp', 'contractor', 1, '2020-07-20', 'Professional'),
(147, 'Shubham', 'shubham.designoweb+91@gmail.com', '8467080004', '123456', 'contractor', 1, '2020-07-21', 'Professional'),
(148, 'nsnsn', 'rohan@gmail.sk', '8467694679', '123456', 'contractor', 1, '2020-07-21', 'Professional'),
(149, 'shubham', 'shubham.designoweb+12@gmail.com', '8467080001', '123456', NULL, 1, '2020-07-21', 'Professional'),
(150, 'Shubham', 'shubham.designoweb+23@gmail.com', '8467080001', '123456', 'contractor', 1, '2020-07-21', 'Professional'),
(151, 'bhawna', 'bhawna.bg33@gmail.com', '8923587509', '123456', 'contractor', 1, '2020-07-21', 'Professional'),
(152, 'shubham', 'shubham@gmail.com', '8467080002', '123456', 'contractor', 1, '2020-07-21', 'Professional'),
(153, 'test', 'testing@gmail.com', '9634790868', '123456', 'contractor', 1, '2020-07-21', 'Professional'),
(154, 'Rohit', 'rohit.designoweb@gmail.com', '8467080001', '123456', 'supplier', 1, '2020-07-24', 'Professional'),
(155, 'Filiberto Amos', 'filibertoamos.94939@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(156, 'Rachit Sharma', 'rachitsharma512@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(157, 'Sinan ', 'sbalcin@gmail.com', '7543332030', 'xzSAwq21', 'supplier', 1, '2020-07-28', 'Professional'),
(158, '??? ???', 'ramatct@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(159, 'Sedima', 'rienethsedima@gmail.com', '0749408880', 'Rieneth8719', NULL, 1, '2020-07-31', 'Professional'),
(160, 'Rinat', 'rinati07@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(161, 'Cornel Hattingh', 'cornelha@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(162, 'Perfect Constance', 'constanceperfect@gmail.com', NULL, NULL, 'contractor', 1, '', 'Professional'),
(163, 'mellisa Hattingh', 'mellisa@freshlymade.co.za', '0832619515', 'fishsticks', 'contractor', 1, '2020-08-15', 'Professional'),
(164, 'Veronica Sanchez', 'verosanz23212321@gmail.com', NULL, NULL, 'supplier', 1, '', 'Professional'),
(165, 'Bence Szádoczki', 'benngi87@gmail.com', NULL, NULL, NULL, 1, '', 'Professional'),
(166, 'Roger Bayekula', 'rogerbayekula295@gmail.com', NULL, NULL, NULL, 1, '', 'Professional');

-- --------------------------------------------------------

--
-- Table structure for table `marketplace_aoi`
--

CREATE TABLE `marketplace_aoi` (
  `id` int(11) NOT NULL,
  `aoi_desc_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketplace_aoi`
--

INSERT INTO `marketplace_aoi` (`id`, `aoi_desc_id`, `market_user_id`) VALUES
(1, 26, 1),
(2, 25, 1),
(3, 26, 2),
(4, 25, 2),
(5, 24, 2),
(58, 2, 12),
(57, 3, 12),
(56, 1, 12),
(55, 4, 12),
(54, 5, 12),
(53, 6, 12),
(52, 7, 12),
(51, 13, 12),
(50, 14, 12),
(49, 15, 12),
(48, 16, 12),
(47, 17, 12),
(21, 31, 16),
(20, 0, 16),
(22, 32, 16),
(23, 13, 19),
(24, 14, 19),
(25, 15, 19),
(26, 16, 19),
(27, 17, 19),
(28, 4, 21),
(29, 5, 21),
(30, 6, 21),
(31, 7, 21),
(32, 3, 34),
(33, 1, 36),
(34, 2, 36),
(59, 70, 39),
(175, 43, 41),
(61, 35, 47),
(62, 13, 48),
(63, 15, 48),
(64, 17, 48),
(65, 1, 52),
(66, 2, 52),
(67, 1, 52),
(68, 2, 52),
(69, 68, 55),
(70, 70, 55),
(71, 69, 55),
(72, 71, 55),
(73, 43, 54),
(74, 42, 54),
(75, 70, 54),
(76, 12, 59),
(77, 10, 59),
(78, 9, 59),
(79, 28, 62),
(80, 27, 62),
(81, 54, 62),
(111, 56, 68),
(110, 50, 68),
(109, 47, 68),
(108, 48, 68),
(107, 42, 68),
(106, 39, 68),
(105, 38, 68),
(104, 37, 68),
(103, 36, 68),
(102, 31, 68),
(101, 32, 68),
(100, 27, 68),
(99, 28, 68),
(98, 21, 68),
(97, 23, 68),
(112, 27, 73),
(113, 28, 73),
(114, 24, 73),
(115, 23, 73),
(116, 39, 73),
(117, 4, 74),
(118, 5, 74),
(119, 6, 74),
(120, 47, 74),
(121, 46, 74),
(122, 45, 74),
(123, 48, 74),
(124, 49, 74),
(125, 50, 74),
(126, 51, 74),
(127, 13, 74),
(128, 14, 74),
(129, 15, 74),
(130, 16, 74),
(131, 17, 74),
(132, 18, 74),
(133, 19, 74),
(134, 20, 74),
(135, 23, 74),
(136, 24, 74),
(137, 25, 74),
(138, 26, 74),
(139, 22, 74),
(140, 21, 74),
(141, 28, 74),
(142, 30, 74),
(143, 29, 74),
(144, 27, 74),
(145, 36, 74),
(146, 39, 74),
(147, 38, 74),
(148, 37, 74),
(149, 40, 74),
(150, 41, 74),
(151, 72, 74),
(152, 56, 74),
(153, 57, 74),
(154, 58, 74),
(155, 59, 74),
(156, 60, 74),
(157, 8, 74),
(158, 11, 74),
(159, 12, 74),
(160, 10, 74),
(161, 9, 74),
(162, 31, 74),
(163, 32, 74),
(164, 33, 74),
(165, 34, 74),
(166, 35, 74),
(167, 13, 75),
(168, 14, 75),
(169, 15, 75),
(170, 16, 75),
(171, 17, 75),
(176, 4, 80),
(177, 13, 80),
(178, 24, 81),
(179, 23, 81),
(180, 22, 81),
(181, 21, 81),
(182, 26, 81),
(183, 25, 81),
(184, 18, 82),
(185, 19, 82),
(186, 20, 82),
(187, 50, 82),
(188, 72, 82),
(189, 45, 84),
(190, 46, 84),
(191, 47, 84),
(192, 48, 84),
(193, 50, 84),
(194, 51, 84),
(195, 52, 84),
(196, 53, 84),
(197, 54, 84),
(198, 55, 84),
(199, 49, 84),
(200, 0, 89),
(201, 26, 89),
(202, 25, 89),
(203, 24, 89),
(204, 22, 89),
(205, 21, 89),
(206, 42, 91),
(207, 18, 97),
(208, 19, 97),
(209, 20, 97),
(210, 18, 99),
(211, 27, 99),
(212, 28, 99),
(213, 40, 99),
(214, 39, 99),
(215, 38, 99),
(216, 37, 99),
(217, 36, 99),
(231, 7, 43),
(230, 6, 43),
(229, 5, 43),
(228, 4, 43),
(227, 3, 43),
(226, 2, 43),
(225, 1, 43),
(232, 6, 100),
(233, 0, 101),
(234, 4, 101),
(235, 5, 101),
(236, 2, 101),
(237, 9, 101),
(238, 7, 103),
(239, 5, 103),
(240, 4, 103),
(241, 6, 103),
(242, 45, 106),
(243, 4, 109),
(244, 6, 109),
(250, 20, 110),
(249, 18, 110),
(248, 0, 110),
(251, 19, 110),
(252, 56, 112),
(253, 56, 112),
(254, 4, 113),
(255, 6, 113),
(256, 5, 113),
(257, 7, 113),
(258, 13, 119),
(259, 41, 121),
(260, 43, 121),
(261, 70, 121),
(262, 71, 121),
(263, 72, 121),
(264, 41, 121),
(265, 43, 121),
(266, 70, 121),
(267, 71, 121),
(268, 72, 121),
(269, 27, 122),
(270, 28, 122),
(271, 30, 122),
(272, 5, 123),
(322, 1, 125),
(321, 0, 125),
(276, 29, 33),
(277, 1, 127),
(278, 2, 127),
(347, 9, 128),
(346, 8, 128),
(286, 7, 130),
(285, 5, 130),
(284, 4, 130),
(320, 3, 132),
(319, 2, 132),
(318, 1, 132),
(317, 3, 132),
(316, 2, 132),
(315, 1, 132),
(308, 2, 133),
(307, 1, 133),
(306, 2, 133),
(305, 1, 133),
(331, 19, 135),
(330, 0, 135),
(325, 0, 136),
(326, 15, 136),
(327, 1, 137),
(328, 2, 137),
(329, 3, 137),
(332, 18, 135),
(353, 0, 141),
(334, 17, 140),
(335, 8, 146),
(336, 9, 146),
(337, 10, 146),
(338, 11, 146),
(339, 12, 146),
(340, 11, 147),
(341, 10, 147),
(342, 13, 148),
(343, 14, 148),
(344, 2, 150),
(345, 3, 150),
(348, 4, 151),
(349, 5, 151),
(350, 14, 152),
(351, 15, 152),
(352, 4, 153),
(354, 21, 141),
(355, 0, 138),
(356, 1, 138),
(357, 5, 154),
(358, 1, 157),
(359, 2, 157),
(360, 28, 162),
(361, 38, 163),
(362, 1, 164),
(363, 10, 164);

-- --------------------------------------------------------

--
-- Table structure for table `marketplace_location`
--

CREATE TABLE `marketplace_location` (
  `id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketplace_location`
--

INSERT INTO `marketplace_location` (`id`, `market_user_id`, `location_id`) VALUES
(1, 1, 8),
(2, 2, 6),
(3, 3, 5),
(30, 12, 1),
(29, 12, 3),
(28, 12, 5),
(7, 13, 1),
(11, 16, 5),
(10, 16, 0),
(12, 16, 1),
(13, 19, 1),
(14, 19, 5),
(15, 21, 1),
(16, 21, 3),
(17, 21, 5),
(18, 21, 14),
(19, 21, 10),
(20, 21, 11),
(21, 21, 23),
(22, 34, 1),
(23, 36, 2),
(24, 36, 1),
(31, 39, 5),
(58, 41, 3),
(33, 47, 1),
(34, 48, 1),
(35, 52, 1),
(36, 52, 3),
(37, 52, 4),
(38, 52, 1),
(39, 52, 3),
(40, 52, 4),
(41, 55, 5),
(42, 55, 1),
(43, 54, 1),
(44, 59, 4),
(45, 62, 4),
(47, 68, 1),
(48, 73, 2),
(49, 74, 1),
(50, 74, 5),
(51, 75, 1),
(52, 75, 3),
(53, 75, 5),
(54, 75, 14),
(59, 80, 5),
(60, 80, 1),
(61, 81, 2),
(62, 82, 5),
(63, 82, 1),
(64, 82, 20),
(65, 82, 28),
(66, 82, 11),
(67, 82, 6),
(68, 84, 5),
(69, 84, 1),
(70, 84, 23),
(71, 84, 32),
(72, 89, 0),
(73, 89, 8),
(74, 88, 1),
(75, 88, 3),
(76, 88, 5),
(77, 88, 6),
(78, 88, 14),
(79, 91, 1),
(80, 97, 5),
(81, 97, 1),
(82, 97, 3),
(83, 97, 6),
(84, 97, 14),
(85, 99, 22),
(86, 99, 25),
(87, 99, 29),
(88, 99, 33),
(89, 99, 56),
(90, 99, 66),
(91, 99, 12),
(99, 43, 1),
(98, 43, 2),
(97, 43, 9),
(96, 43, 5),
(100, 100, 4),
(101, 101, 0),
(102, 101, 2),
(103, 101, 17),
(104, 101, 38),
(105, 103, 1),
(106, 103, 3),
(107, 103, 5),
(108, 103, 6),
(109, 103, 9),
(110, 103, 11),
(111, 103, 14),
(112, 103, 16),
(113, 103, 18),
(114, 103, 20),
(115, 103, 21),
(116, 103, 23),
(117, 103, 27),
(118, 103, 28),
(119, 103, 32),
(120, 103, 31),
(121, 103, 35),
(122, 103, 36),
(123, 103, 37),
(124, 103, 39),
(125, 103, 43),
(126, 103, 55),
(127, 104, 5),
(128, 106, 1),
(129, 109, 1),
(131, 110, 0),
(132, 110, 1),
(133, 112, 1),
(134, 112, 1),
(135, 113, 1),
(136, 119, 1),
(137, 121, 1),
(138, 121, 1),
(139, 122, 5),
(140, 122, 1),
(141, 123, 9),
(142, 124, 0),
(143, 124, 5),
(144, 124, 1),
(242, 125, 1),
(241, 125, 0),
(149, 33, 7),
(150, 33, 10),
(151, 127, 6),
(264, 128, 4),
(153, 129, 5),
(154, 129, 6),
(155, 129, 9),
(156, 129, 11),
(157, 129, 13),
(158, 129, 14),
(159, 129, 16),
(160, 129, 18),
(161, 129, 20),
(162, 129, 21),
(163, 129, 23),
(164, 129, 28),
(165, 129, 36),
(166, 129, 39),
(167, 129, 44),
(168, 129, 47),
(169, 129, 48),
(170, 129, 53),
(171, 129, 55),
(172, 129, 1),
(173, 129, 3),
(174, 129, 4),
(175, 129, 37),
(176, 129, 72),
(177, 129, 5),
(178, 129, 6),
(179, 129, 9),
(180, 129, 11),
(181, 129, 13),
(182, 129, 14),
(183, 129, 16),
(184, 129, 18),
(185, 129, 20),
(186, 129, 21),
(187, 129, 23),
(188, 129, 28),
(189, 129, 36),
(190, 129, 39),
(191, 129, 44),
(192, 129, 47),
(193, 129, 48),
(194, 129, 53),
(195, 129, 55),
(196, 129, 1),
(197, 129, 3),
(198, 129, 4),
(199, 129, 37),
(200, 129, 72),
(206, 130, 3),
(205, 130, 2),
(204, 130, 1),
(240, 132, 7),
(239, 132, 9),
(238, 132, 2),
(237, 132, 7),
(236, 132, 9),
(235, 132, 2),
(228, 133, 3),
(227, 133, 2),
(226, 133, 3),
(225, 133, 2),
(247, 135, 0),
(244, 136, 0),
(245, 136, 1),
(246, 137, 1),
(248, 135, 1),
(271, 141, 0),
(250, 140, 6),
(251, 140, 8),
(252, 140, 11),
(253, 146, 3),
(254, 146, 4),
(255, 146, 5),
(256, 147, 2),
(257, 147, 6),
(258, 147, 1),
(259, 148, 3),
(260, 150, 2),
(261, 150, 4),
(262, 150, 7),
(263, 150, 1),
(265, 151, 2),
(266, 151, 3),
(267, 151, 4),
(268, 152, 2),
(269, 152, 3),
(270, 153, 3),
(272, 141, 4),
(273, 138, 0),
(274, 138, 1),
(275, 154, 2),
(276, 157, 3),
(277, 157, 5),
(278, 162, 5),
(279, 163, 2),
(280, 164, 4);

-- --------------------------------------------------------

--
-- Table structure for table `marketplace_notification`
--

CREATE TABLE `marketplace_notification` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `notification` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marketplace_project`
--

CREATE TABLE `marketplace_project` (
  `project_id` int(11) NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketplace_project`
--

INSERT INTO `marketplace_project` (`project_id`, `contractor_id`, `name`, `location_id`, `price`) VALUES
(1, 82, 'Von Willigh', 5, 40000),
(2, 12, 'AVBOB Jabulani ', 1, 9250000),
(3, 129, 'Robert', 1, 15000),
(4, 163, 'testproject', 2, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `marketplace_project_images`
--

CREATE TABLE `marketplace_project_images` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketplace_project_images`
--

INSERT INTO `marketplace_project_images` (`id`, `project_id`, `images`) VALUES
(1, 1, '60627.jpeg'),
(2, 1, '37670.jpeg'),
(3, 1, '12763.jpeg'),
(4, 2, '15295.jpg'),
(12, 3, '37733.jpg'),
(11, 3, '21699.jpg'),
(13, 4, '70352.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `marketplace_qualification`
--

CREATE TABLE `marketplace_qualification` (
  `qualification_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `qualification` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketplace_qualification`
--

INSERT INTO `marketplace_qualification` (`qualification_id`, `market_user_id`, `qualification`) VALUES
(1, 1, 'btech'),
(2, 1, ''),
(3, 2, 'btech'),
(4, 2, ''),
(5, 3, 'btech'),
(6, 3, ''),
(20, 12, ''),
(9, 13, 'BSc Hons Construction Management '),
(10, 13, ''),
(12, 16, 'SAGGA & AAAMSA'),
(13, 19, 'Matric'),
(14, 34, 'b.tech'),
(15, 34, ''),
(16, 36, 'btech'),
(17, 36, ''),
(21, 12, 'BSc Hons Construction Management '),
(45, 41, 'industrial refrigeratotion mechanic '),
(44, 41, ''),
(24, 48, 'registered building contractor'),
(25, 48, ''),
(26, 52, 'btech '),
(27, 52, ''),
(28, 52, 'btech '),
(29, 52, ''),
(30, 54, 'AIRCON AND REFRIGERATION TECHNICIAN '),
(31, 54, ''),
(32, 62, 'Modern finishers'),
(33, 73, 'Management '),
(34, 73, ''),
(35, 74, '20 years Experience'),
(36, 75, 'D'),
(37, 75, ''),
(46, 80, 'BTech Construction Management '),
(47, 82, 'NACE 3'),
(48, 84, 'Mechanical & Civil Engineering '),
(49, 84, ' Building Contractors'),
(50, 88, 'WATERPROOFING SPECIALIST '),
(51, 88, ''),
(52, 97, 'Materials Engineer '),
(53, 97, ''),
(54, 99, 'Self'),
(55, 99, ''),
(59, 43, 'none'),
(58, 43, ''),
(60, 104, '20 years experience in painting and waterproofing as well as tiling'),
(61, 104, ' ceilings'),
(62, 104, ' drywaling'),
(63, 104, ''),
(64, 109, 'Unsure'),
(66, 110, 'Diploma'),
(67, 121, 'Plumbing'),
(68, 121, ' Solar'),
(69, 121, ' Heatpumps'),
(70, 121, ' Water tanks'),
(71, 121, ' Jetting'),
(72, 121, ' Camera inspections'),
(73, 121, ''),
(74, 121, 'Plumbing'),
(75, 121, ' Solar'),
(76, 121, ' Heatpumps'),
(77, 121, ' Water tanks'),
(78, 121, ' Jetting'),
(79, 121, ' Camera inspections'),
(80, 121, ''),
(81, 122, 'BSocSci: Industrial Sociology and Labour studies'),
(82, 122, ''),
(83, 124, 'Certified contractor-Rainbird'),
(84, 124, ' SABI'),
(85, 124, ' LIA'),
(86, 124, '25yrs experience '),
(113, 125, 'Test'),
(89, 33, 'Graduated'),
(90, 33, ''),
(91, 127, '12'),
(92, 127, ''),
(128, 128, '12'),
(127, 128, ''),
(95, 129, 'building'),
(96, 129, ' roofing'),
(97, 129, 'plastering'),
(98, 129, 'ceilings'),
(99, 129, 'house painting'),
(100, 129, 'and tilling)roof spray'),
(101, 129, ''),
(102, 129, 'building'),
(103, 129, ' roofing'),
(104, 129, 'plastering'),
(105, 129, 'ceilings'),
(106, 129, 'house painting'),
(107, 129, 'and tilling)roof spray'),
(108, 129, ''),
(112, 130, 'btech'),
(111, 130, ''),
(116, 135, '10'),
(115, 137, 'None'),
(117, 135, 'did wdlw weekly d was ok w;q asks d as;owed we add;on wade so;and q;wa as;odd wows d asdjwuwe ASOS wow d '),
(135, 141, 'I have done so many things that I don’t even remember. So please provide your demands.'),
(119, 146, '1'),
(120, 146, ''),
(121, 147, 'MCA'),
(122, 147, ''),
(123, 148, '12'),
(124, 148, ''),
(125, 150, 'MCA'),
(126, 150, ''),
(129, 151, 'btech'),
(130, 151, ''),
(131, 152, 'mca'),
(132, 152, ''),
(133, 153, 'mca '),
(134, 153, ''),
(136, 162, 'ceiling  '),
(137, 162, ' paving '),
(138, 162, 'tar surface'),
(139, 162, ' tiling'),
(140, 162, 'steel works'),
(141, 162, 'house renovation '),
(142, 162, ''),
(143, 163, 'quali1'),
(144, 163, 'quali2');

-- --------------------------------------------------------

--
-- Table structure for table `marketplace_review`
--

CREATE TABLE `marketplace_review` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(10) NOT NULL,
  `reciever_id` varchar(10) NOT NULL,
  `sender_type` varchar(20) NOT NULL,
  `reciever_type` varchar(20) NOT NULL,
  `msg` text NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketplace_review`
--

INSERT INTO `marketplace_review` (`id`, `sender_id`, `reciever_id`, `sender_type`, `reciever_type`, `msg`, `rating`) VALUES
(1, '52', '12', 'tender', 'contractor', 'Came to site neat. completed within time and actually came down in price on final invoice. highly recommend ', 5),
(2, '41', '110', 'tender', 'contractor', 'Great review ', 5),
(3, '41', '110', 'tender', 'contractor', 'Great review ', 5),
(4, '45', '121', 'tender', 'contractor', 'Hdhd', 5),
(5, '45', '121', 'tender', 'contractor', 'Hdhd', 5),
(6, '47', '109', 'tender', 'contractor', 'Test \nTest\nTest test', 4),
(7, '47', '109', 'tender', 'contractor', 'Test \nTest\nTest test', 4),
(8, '47', '3', 'tender', 'contractor', 'Great', 4),
(9, '47', '125', 'tender', 'contractor', 'Test', 4),
(10, '47', '125', 'tender', 'contractor', 'Test', 4),
(11, '1', '109', 'tender', 'contractor', 'Fix test', 5),
(12, '1', '110', 'tender', 'contractor', '????????????????', 1),
(13, '11', '110', 'tender', 'contractor', 'Hes average ', 1),
(14, '50', '130', 'tender', 'contractor', 'test', 5),
(15, '50', '130', 'tender', 'contractor', 'test', 4),
(16, '50', '130', 'tender', 'contractor', 'test', 3),
(17, '50', '130', 'tender', 'contractor', 'test', 3),
(18, '50', '130', 'tender', 'contractor', 'test', 1),
(19, '50', '130', 'tender', 'contractor', 'yyytftt', 1),
(20, '50', '130', 'tender', 'contractor', 'are you getting a push notification for this ', 5),
(21, '50', '128', 'tender', 'contractor', 'are you getting a push notification that I rated you', 5),
(22, '50', '127', 'tender', 'contractor', 'are you getting push notification that  rated you', 5),
(23, '50', '125', 'tender', 'contractor', 'do you get push notification that I rated  you', 5),
(24, '12', '129', 'contractor', 'sub_contractor', 'He did a lovely job. would use him again. ', 3),
(25, '', '137', 'tender', 'contractor', 'No', 1),
(26, '', '137', 'tender', 'contractor', 'No', 1),
(27, '65', '163', 'tender', 'contractor', 'Test review', 5);

-- --------------------------------------------------------

--
-- Table structure for table `marketplace_skills`
--

CREATE TABLE `marketplace_skills` (
  `id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketplace_skills`
--

INSERT INTO `marketplace_skills` (`id`, `skill_id`, `market_user_id`) VALUES
(1, 4, 112),
(2, 4, 112),
(3, 1, 113),
(4, 5, 119),
(46, 6, 132),
(45, 6, 132),
(44, 5, 132),
(43, 5, 132),
(42, 2, 132),
(41, 2, 132),
(34, 4, 133),
(33, 4, 133),
(32, 3, 133),
(31, 3, 133),
(30, 2, 133),
(29, 2, 133);

-- --------------------------------------------------------

--
-- Table structure for table `marketplace_subscription`
--

CREATE TABLE `marketplace_subscription` (
  `id` int(11) NOT NULL,
  `price` varchar(20) NOT NULL,
  `bids` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `package_type` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketplace_subscription`
--

INSERT INTO `marketplace_subscription` (`id`, `price`, `bids`, `type`, `package_type`, `description`) VALUES
(14, '400', '4', 'contractor', 'Professional', '<b>Includes:</b><br>\r\n\r\n1. Basic Profile<br>\r\n2. Qualifications<br>\r\n3. Capabilities<br> \r\n4. Previous Work<br>  \r\n5. Contact details (Only once paid to bid on a project)<br>\r\n6. Ratings<br> \r\n7. Previous reviews<br>\r\n8. Access to the tenders posted<br> \r\n9. Ability to bid on tenders for a credit<br>\r\n10. In App communication function<br>\r\n11. 2 free credits a month<br>'),
(13, 'Free', '0', 'contractor', 'Basic', '<b>Includes:</b><br>\r\n\r\n1. Basic Profile<br>\r\n2. Qualifications<br>\r\n3. Capabilities<br>\r\n4. Clients can request to contact the free members – they will then get a notification to upgrade to Professional membership in order to receive message<br> \r\n5. Viewing bids posted by clients but cannot bid on them or contact the client<br>\r\n   \r\n<b>Excludes:</b><br>\r\n \r\n1. Any contact details<br> \r\n2. Any ratings<br> \r\n3. Any reviews<br> \r\n4. Ability to bid on tenders<br> \r\n5. In App communication function<br> '),
(17, 'Free', '3', 'supplier', 'Basic', '<b>Includes:</b><br>\r\n\r\n1. Name of Supplier<br> \r\n2. Location<br> \r\n3. Contact<br>\r\n   \r\n<b>Excludes:</b><br>\r\n \r\n6. Any contact details<br> \r\n7. Any ratings<br> \r\n8. Any reviews<br> \r\n9. Ability to bid on tenders<br> \r\n10. In App communication function<br> '),
(6, '500', 'Unlimited', 'supplier', 'Professional', '<b>Includes:</b><br>\r\n\r\n1. Name of Supplier<br>\r\n2. Location<br> \r\n3. Contact<br> \r\n4. Materials/Equipment on offer <br>\r\n5. Prices linked to website <br> '),
(16, 'Free', '3', 'sub_contractor', 'Basic', '<b>Includes:</b><br> \r\n1. Name of Sub-Contractor<br> \r\n2. Location<br> \r\n3. Contact<br>\r\n   \r\n<b>Excludes:</b><br>\r\n\r\n1. Any contact details<br> \r\n2. Any ratings<br> \r\n3. Any reviews<br> \r\n4. Ability to bid on tenders<br> \r\n5. In App communication function<br> '),
(8, '200', 'Unlimited', 'sub_contractor', 'Professional', '<b>Includes:</b><br>\r\n\r\n1. Name of Sub-Contractor<br> \r\n2. Location<br> \r\n3. Contact<br> \r\n4. Materials/Equipment on offer<br> \r\n5. Prices linked to website<br>  '),
(15, '20', '1', 'contractor', 'Single Bid', 'In this User can buy a Single Bid to bid on tenders');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token_id` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `token_id`, `type`, `status`) VALUES
(1, 311765, 'esDoGBFMGAw:APA91bHToavBNK1kmYznkIKXaq9ukoxYwy_E7wP8xHH5d2okmtzARYBHFEHCibx_2e7gG8rZF-E9HKPwyd8YJJ5Q-KaeapbWan2CE73fTzw0U0Mvrqf9NxIdwRSmL6oBdnmnXubcF90y', 'tender', '0'),
(2, 2, 'dNKQr4gHu_Y:APA91bF0IhCuls5NFizgoUVK6Vnvf2bTRb0SfIBQH4qY-H513ptTkCwYRzhLRyv5XV5UneCM1J1_aLhfetJL6B6b6yVeBq9y5pfsv7hqnQUwoxl_og7IYmPF6ZtdUM5A4bwB_07HFQJH', 'labour', '0'),
(3, 17, 'eR_jc4JTbP0:APA91bH_F83Yj01IVRmtF5eUKPFa1G7IDsfFMsI8CGGkBB5m0Fx1vnSR0fMa253u60HpUrTvNS1siXEiXx_tH5Gq-DXxWe3hRKikqFvHJhbF4-CS347cHXDMyuYbqCR1jtBS8Ed0fxFR', 'contractor', '0'),
(4, 781319, 'cn_UnvsGFLg:APA91bFUB-ri5wrbzNXx9kzzOB-s82BYlCKvz-SgEm9rwK54v6GklsyJ3kIk8y6MBKOdEFulumnirilQhjo6S6KMKJIi38yqH_oFNfi1MEu45dcPMKQhAuPpthf6J_FOVBxvjTLLtIIo', 'tender', '0'),
(5, 1, 'dOie47-FCk2cg0Lycr_yl_:APA91bG3DSsbLYpLxCO5GzMoa6bM92OBHplAmyJzJt6V9X2uzMHaZ1VGJJCVVqmgJ4e4ce3VPu8YidDZspC9P9EogS6gbp-nUJ-K1fCezJOqciUljEfOXAEOjtbYXfSJUAx8jOz1vA_h', 'contractor', '0'),
(13, 11, 'dU8pqRFe3Qg:APA91bGha6rY619jUEMTXiGW9hjI3zsAZghGwwwACWdV2bhqytVzMZDniZ911REiTlWpD_9-QOHMk6WRa7uba5UL6x15LA0ive9cDBN2Orxq2O5IAPVe1hGaMl9FdBCAriN2GoAAe0bK', 'contractor', '0'),
(6, 621151, 'fcdce8lEymY:APA91bEC0V2DG1_EFj1h_wxKcGw_m5HLktdJbfbazZt0q_2rKSdun0L_gUVi_QzArsZTgllcQ5bo20zO6_VVg9qWGoMuXmmV3CNJr7FuonnH6xzKo3h5nMzSWSYhAg9bp6lYhB4uHRdF', 'tender', '0'),
(7, 166490, 'eFirgsmD8DM:APA91bFu9aENzXXppoYhjO4ff1aShPa0XlT5bwduCE-4f6XGhXWvQDivXWk7gCYktqrb-PZlwsqFxI68GwaMALlpCYGteDQsBroQHfy4AfiVm0V_xcuSVi7iWjv3xzGwiJVBV7CDRTll', 'tender', '0'),
(34, 32, 'cM_eemH36D0:APA91bFb39A4eu9C8UE4CvPjfBEmCPkA7nqeA_E9RLxYMPgNY3mCH-T1FGoXOhjBYXTXzs4tdMyL2T_pVjFwO58p5nK9UzodJ2fwSKedbFIMLDj9cpSS00EZx6X_-a0mQGuY5h5KICCB', 'contractor', '0'),
(8, 454441, 'faKksyGeM1w:APA91bFnHfRd_n6EYkZ-0mETiDt_XizxdRrubqE5rir4bn6lqS4YTS8OXLtYjeUGd2nsFaRPT0ItgMzcgg9SxZKchicZBnkBPo0P5tKzGSrTh8OhLO3kwX7FXxyqMZQ2cWnwERoIITM0', 'tender', '0'),
(9, 18, 'dBtSO1YtZfQ:APA91bGxs1d5PMcym0wHg1ujlTwgimkljIxyWmDvLrcxZQmKV5f-AzGJcvvMe5xHTVUzE64dLD6wIY5mTrDlBG3Xwoyp_8T-ezXBZDOs7uoPV0n5t5zof8y3bKU3hvnc58tNKOsWePJ8', 'subcontractor', '0'),
(10, 7, 'cYD6uss2H0iHvWr1m3B8J5:APA91bGBradQWydLoAXLYSYqqU2YH0fDY6Z0F-n6UlSYo9oCQcITbnByKWbOA3jWz9C8Kj8ZLHN3ZA4yC-P2ggIvcpOL3vpYdNGtyMRvc1Gx1Dq8bjLdYON6EmquX8cyYaIVe5PaLyj_', 'supplier', '0'),
(11, 5, 'dtWgUR0bNmc:APA91bF_sQcTMPJ4rseAEWtrRclH2VnkkKRh2TlVJuFiHSuGDC-5et9tGK8O4dlWbMyoQNggJWdlRo-HnfNEKrrg5F2TDB2JU2-vZn5sZ0LXoG21Js8M-Lk-pyTjK4I7Hv4fO6l5415x', 'subcontractor', '0'),
(12, 15, 'fBnGisyuYH0:APA91bHMuGZdGTgN8yJI9s76JPSYJzzb4SX_hZ_U07UCWsWPujka8XMprEQyHhBokIFre5JwCbL4GLtDaiE5U9D1RZDGlgX-ZiTB8bkwlDrBeJu9eh-q4wI-Og2GEBoWzpGV5PgeKQaD', 'contractor', '0'),
(14, 20, ' ', 'supplier', '0'),
(15, 588212, 'dIVF5_Kr8SQ:APA91bEx26_jE9lymjzpadaxQPzPOJIdgV7G9wjuyn7n7hv-NciQ6UX8uGi0wV7cxtPcK5CCy8MeZNM2Q8a9satJq5ihcxQ9Wa8uYMMwtkIcWAvicbgCGPFnnBJXlyNLRBC1Qes0J-Yj', 'tender', '0'),
(16, 21, 'dBtSO1YtZfQ:APA91bGxs1d5PMcym0wHg1ujlTwgimkljIxyWmDvLrcxZQmKV5f-AzGJcvvMe5xHTVUzE64dLD6wIY5mTrDlBG3Xwoyp_8T-ezXBZDOs7uoPV0n5t5zof8y3bKU3hvnc58tNKOsWePJ8', 'labour', '0'),
(48, 13, 'c9M-NWtaZeY:APA91bFE3y8K2F68TphHD0SlBoPVBc-0TWagvC4OiiX1eC1mdXGp2njQzgZvwrDnsu5l6IbzIYpvC7O8ML6BvCPxabRY8ILZ1GfzNKFRKItaVy8u0S2RI75XyOokrQkgIq1ga29h9E_J', 'contractor', '0'),
(17, 22, 'faLPh5wJr3E:APA91bGlqwoWFsLERkjPY1iw_V-vcJtwn4Eisahxpa6Czb9_qs8cjFdnHPhCh8gT1YEo7S5NsrVwOMi-jN4tQrHjv45KmqzEvjsZElbrBAACD1Uc71n0eXG0X1SS6LvlQfme6FJBJ8XB', 'subcontractor', '0'),
(18, 23, 'dtWgUR0bNmc:APA91bF_sQcTMPJ4rseAEWtrRclH2VnkkKRh2TlVJuFiHSuGDC-5et9tGK8O4dlWbMyoQNggJWdlRo-HnfNEKrrg5F2TDB2JU2-vZn5sZ0LXoG21Js8M-Lk-pyTjK4I7Hv4fO6l5415x', 'subcontractor', '0'),
(19, 0, ' ', 'tender', '0'),
(30, 31, 'faLPh5wJr3E:APA91bGlqwoWFsLERkjPY1iw_V-vcJtwn4Eisahxpa6Czb9_qs8cjFdnHPhCh8gT1YEo7S5NsrVwOMi-jN4tQrHjv45KmqzEvjsZElbrBAACD1Uc71n0eXG0X1SS6LvlQfme6FJBJ8XB', 'labour', '0'),
(20, 25, 'eCW85Wtia60:APA91bHylc9STGcSi-HNvUDps0p0JeNHexsTcS7LeHIGim4hzvXMA6scZdXVTWbGDSOrkhxTmXzcK31m7FNRmNqWymk1BLzQqBV-wbTyJhQTgOrd9GUaBJ5RrA0aQPbcX8pcLEZALq2D', 'supplier', '0'),
(21, 24, ' ', 'supplier', '0'),
(22, 26, 'dtWgUR0bNmc:APA91bF_sQcTMPJ4rseAEWtrRclH2VnkkKRh2TlVJuFiHSuGDC-5et9tGK8O4dlWbMyoQNggJWdlRo-HnfNEKrrg5F2TDB2JU2-vZn5sZ0LXoG21Js8M-Lk-pyTjK4I7Hv4fO6l5415x', 'supplier', '0'),
(23, 28, 'cYD6uss2H0iHvWr1m3B8J5:APA91bGBradQWydLoAXLYSYqqU2YH0fDY6Z0F-n6UlSYo9oCQcITbnByKWbOA3jWz9C8Kj8ZLHN3ZA4yC-P2ggIvcpOL3vpYdNGtyMRvc1Gx1Dq8bjLdYON6EmquX8cyYaIVe5PaLyj_', 'sub_contractor', '0'),
(24, 311247, 'd9tmJLBfSn0:APA91bGK8R1NpVnFyU43IUY3iZ0n4W1RA4TUe87e7D8nPDHzQYOtvnfUQS38fhhS3dPZqbMmPcXOKmXzew3F5vhRUtsyyrmogYLzjudPQFznTilTMQPaVKR_EJiSnBRGH1QMaulxTIrJ', 'tender', '0'),
(25, 29, ' ', 'sub_contractor', '0'),
(26, 333011, 'cl-wnga67b0:APA91bFPdsWe7n8jU-HpA3Iy9WfQ6_CABYzGMDiN5ZwRW-maupxQCxyEbWYM0Yy0R57msXbA_vaINMh5ngMH465ksvC2-obax8qTf176isYBJ0JbmVyei870G5jxVggqCQMssN3zoKhq', 'tender', '0'),
(27, 28, 'e2gdOmL-mEY:APA91bGvuxiR5Ebdng3_Nt2ja01qFbkwFX4LaPpYZwcxymLrH8eMTSOWN2zVkXtffmyn8KhGfIvuq8WdCcLX_d4E7Grud9Q-ut8BWeEyODhV2QBFSg9zn0_nf-P20YbWw51N5Y9Yc_vZ', 'subcontractor', '0'),
(28, 927415, 'd7P-9NLm2aI:APA91bHd35Pw75wbqyGrlvnU4_aBZTPBWQg7TjD0yXLHdrehIIf4rKr_U9WYqMw1YPLIqP-KMXB53-D5KAdg93LLdDxSDYo5lurwQVR7ZVq6qWB03BpK6yeu50j9_FTRsre5iKqa9YIl', 'tender', '0'),
(29, 6, 'ea-A32Zw-Sg:APA91bGuwLQjzYULk-oMMI5VavoPgEhuNBy0-JR6FipmsTCqsQ44mYaAr0S_b-iXNnGZrevo-eOFX9oBOLCmrsLOrl2GRYcTC3-Gg9qI36jHYW63gUggKJxYM5n47JEU-_U169jIc8WD', 'sub_contractor', '0'),
(52, 50, 'e2gdOmL-mEY:APA91bGvuxiR5Ebdng3_Nt2ja01qFbkwFX4LaPpYZwcxymLrH8eMTSOWN2zVkXtffmyn8KhGfIvuq8WdCcLX_d4E7Grud9Q-ut8BWeEyODhV2QBFSg9zn0_nf-P20YbWw51N5Y9Yc_vZ', 'contractor', '0'),
(33, 920126, 'fcdce8lEymY:APA91bEC0V2DG1_EFj1h_wxKcGw_m5HLktdJbfbazZt0q_2rKSdun0L_gUVi_QzArsZTgllcQ5bo20zO6_VVg9qWGoMuXmmV3CNJr7FuonnH6xzKo3h5nMzSWSYhAg9bp6lYhB4uHRdF', 'tender', '0'),
(31, 851092, 'f73rAuWP3-E:APA91bEDPnCm8m_uSddI8PCwq0oMBU7fFFLtO4NiQpW0jzq3THjszmjI7F1gYKmhNO3-A7B9uxENJWMeqG2iPz-iN11P9r8WoG8xoNaLIvYsMdNFYCFYz3XgyFDEAkt7OiHU3iTFIqiN', 'tender', '0'),
(32, 830550, 'fkX_549VN8g:APA91bEnpRj-Ot3_t9pIYBdGe6fxMk-D7JI7b8tuQ8b7gLMoco_IDLkDE8Mu6yTyOp_Jj2K9OkAv1Zfc-RKAiWw_8vGwCGAyOhVSzS8-QPi0ZiieesKIIxFJLnTRk_Z6w_BQs-HNSPVH', 'tender', '0'),
(35, 602055, 'evyuiRoVM6E:APA91bHO4RC7UyoPHikz9mBlThpSVtkjbhwWjpwhGjrAb32Rgm2IZDOTGsrc9h5F1iICVqrH3Xl-hx8eNFuUBvc4UALRY4XFRG3iurzXlRZScvBT8aJir9GKG3mmIRVyOb85bzcNCEwW', 'tender', '0'),
(36, 33, 'fXC0FPSNdGQ:APA91bEhNNdoC45oWitQhYrGJTWuTtBUu6dVi3ReYCmJJ_S4sylhpXarMqNCY7ywPi4efFx6rTukoFJooZXQ9tR9zA7s95XqykSQkLM8NfJCXsrrNGOMKcQEfZhfqFPLnjYkgJ8hlOKE', 'subcontractor', '0'),
(37, 551625, 'fKbU5RSulyw:APA91bGmaNmCPzlPKc9RQxz-CfswKX5y0bjYvcvfIv2p2gOH0sli9-T_y855-rVd3LtrGRpTWjVeGj6X1JXXtUBYZhiOc2jRVgaWT_ojSnSyHzofm1nWge5n3532Dz84SE4_Bu3T_stM', 'tender', '0'),
(38, 771069, 'dIVF5_Kr8SQ:APA91bEx26_jE9lymjzpadaxQPzPOJIdgV7G9wjuyn7n7hv-NciQ6UX8uGi0wV7cxtPcK5CCy8MeZNM2Q8a9satJq5ihcxQ9Wa8uYMMwtkIcWAvicbgCGPFnnBJXlyNLRBC1Qes0J-Yj', 'tender', '0'),
(39, 56, 'fPQdkagJUhM:APA91bE3Q-k5z8kwxJ0_d8FOZZyxwctWQFfkDH_JMn_QveSpBt0-QCYsd_Z4Di_8LyV3nTnayY79ITcT_Cf0q3tsXHu-XDOcsnYN360ojX5o4Q8A_0rMvW1CcHfVKjVX90nJrL1Q_quD', 'contractor', '0'),
(139, 736005, 'esQygMO2Q1w:APA91bHKZXZNm0tgenY366j-xFPjy7l9ePOuZSPhlDKa1HcUeIbTPOagJdWyvep1linmDfIlVs6v5wgyD9ArIzmJpvplv-EehbmmVY3wkSWZu_wnMUMfZ7cQaBKC1KfNJ3nARLKCvibk', 'tender', '0'),
(41, 35, 'cTPXSGxxH0w:APA91bF_Y1zLYZh2D-tqSbWCBpaIxBWtHEPdnruQRTbGyarsQUO6jioql_uoUEu9RuL40X3R0AtLwt2-Xns56ISAT90KrbKmgHkjLGwWNpRfPHccM-aUrbevJ86U8mwERQ-waHkrNmMK', 'supplier', '0'),
(42, 36, 'c1aVnqRFlMg:APA91bHLzVaZ9HXGrTdZZgGanGrD-LFUdhPx9eTtXF51BRbzCxyRBIAWpAw-EX03jtBG6jP3eaLEV3Qa2uZUngTWdQYfvB946l1y31340z_9GZ1hLC1_ezg6A-C_-5BK3wCYyPpo9MLY', 'subcontractor', '0'),
(43, 39, 'fKT5ns56qNo:APA91bEqhDNe_kdRCoP3Ck-xy2CSzmjvCaHaq9sWMmZZSh00S1Itl7TiZbJq3X2ITuyvFQnlljWTkKconD93votFsAshWy9oUOLaC_XOqmH3ipwLbRckQxEPfzt-tu88HCoc_liPc3C8', 'supplier', '0'),
(44, 42, 'ehQnDlQX0xI:APA91bFUDJZWF3jDm6eNSXP8_zwIKSKUnBshgXLrxOdPviQnpisXEWJQONzzbDZJPG3KcKnws3cQcw-OtA1B1qE58GNvnpPKCSMMNuy5WoXBsCftwcKNKV_EYYV9HgHyD_rLxgXEKto1', 'supplier', '0'),
(45, 40, 'dS9ej3HADX4:APA91bG2xUu51NH4vCD3bx8t50zWd52p2EgllM5gF_Y8c0Tmq1aRRGVTLTxXUShDDPkK5FLeRFQmy63PZEzVnMS0kyDsuwvfnnTEg7h_Kbn9eFv8NLNqpfGwof22Q7ZHxCZTw4HgfbTU', 'supplier', '0'),
(46, 43, 'd_uXYNTFclc:APA91bE81LlOsFSXUYZDf4R6YnMed-7vYWdrvSTFV4RE8b42ookJGXBMfWIqd_eFDrOxUfl-uZ-yg4D3wLM52hBD8iOZb2Y3FgJANx7L8znG32tyanvNd3KH_x1b_fXbLDhAxnmVNrcb', 'supplier', '0'),
(50, 616341, 'c0g5a5CfJ_o:APA91bG4Cc5NRrrBZBt5TnkkUuskcbYamBC1YJvrlxXGqjJIF-CM2qa9Fw6TcxJnrapx05rtwtXnPOtNkVDGE6y-FEfhg7_bCGcrBPr-ZWak2Ou3uYql9WyYW2un5VE0V9B8Eu9R7WEu', 'tender', '0'),
(47, 48, 'dBtSO1YtZfQ:APA91bGxs1d5PMcym0wHg1ujlTwgimkljIxyWmDvLrcxZQmKV5f-AzGJcvvMe5xHTVUzE64dLD6wIY5mTrDlBG3Xwoyp_8T-ezXBZDOs7uoPV0n5t5zof8y3bKU3hvnc58tNKOsWePJ8', 'supplier', '0'),
(49, 676397, 'dgwWXMVs4No:APA91bHGp8EKdQ_pwMHS3CziRv4rTcxiXoidTTd6ER8Ph8pUkHbwsYICCCfVW2HFRKqkxkQaEOmsWuVQS8NGJkICsIyaf8fze2aTy3DLNpPKXLuRN_NrI4aOEsCS-BPcytx6Ae8zQXfU', 'tender', '0'),
(51, 533364, 'd7P-9NLm2aI:APA91bHd35Pw75wbqyGrlvnU4_aBZTPBWQg7TjD0yXLHdrehIIf4rKr_U9WYqMw1YPLIqP-KMXB53-D5KAdg93LLdDxSDYo5lurwQVR7ZVq6qWB03BpK6yeu50j9_FTRsre5iKqa9YIl', 'tender', '0'),
(75, 72, 'dM1dlhgOX9o:APA91bF_eLEhV3Do-JWD4zlooH9tvwUb1X4l4GP1jYLoLRAHJXiymiuZA0QgjkSlrAuuL0BnGwnBWfnxRZ2af5Xk3XtYU7IaX4P6w1eCLyfOTbn7mpzOshx7F7JLjijE1pYb3ztlj3dg', 'contractor', '0'),
(53, 887283, 'cU20seZS4Xs:APA91bFVNNDA7pyvJk3vd3zYe7vy6pTepPpUK06YQuXscO6FfWDK4pdViMzC0exnO38uF5RTWqFPPM6XH6fjwn0yYWhWBptR1L-aLxKYObFx1NwV9aq4ziVluQkzbDNm9kUYPKgWDu8z', 'tender', '0'),
(54, 111, 'fbJ0OX1LKlM:APA91bG20oD6_hsrJtO1TYtiHDVqWrIcx1YsYX-FyYlTQgP2b-dhZQTQeHeKpXXl5mf2BCC2nYShwIRN3nnSY_Ad1sRdPTrq2x_HmLmQnGbPlFuD2wBODJNZeLgHmJShjSY4dgUlwyrN', 'contractor', '0'),
(55, 54, 'cSMeKSmeW_Y:APA91bH5rHmyrfN1KtSX9Q39LaaQVSMBf4xqGe5OZ2dewliKooea3_4QEBmpfHJNCJsPXtPUIFsxZ0Dejde3H7BpyEasLGdQQ-n-ZPri-LDJNmNOSoylVoqp7WDNhJdxAsHeauJw6EAL', 'contractor', '0'),
(56, 57, 'f2-_KsShnqk:APA91bHFhtKfzac7N5ItrdJvo9s5vK8mAI1hAAAgbK5U8aD-ZFmK8h3ZCpnGYI5ou8gcxJ2AWiG3JDoLMMn3jovCY-wnYixIyh2Tx6Gs8_E0OqXsm7BmdyrAG64iMYMrlwMcpzmbiTCU', 'contractor', '0'),
(57, 58, 'ci1RnJCsa04zimd3imYiEj:APA91bHPMUDcDMUU90TOKG0WNSR0XtnnUCe4mpLYqO7Snoa-s5ipPNLZaSO1ZqlLLrRGET_xcCWPXmX9eApGN4s7HdqkaRotAm1FpYXdCDtdhtA-7Jwgd6or7knq4M-MTLVzry7NGtar', 'contractor', '0'),
(58, 59, 'f8qjylq34as:APA91bGZG36tL4ACydpzZtznhm3xKZ2-4EPqTC3NEy9Bv-DFGofJrhDcb-wTOZolFJRK_B7M-_olcEl_jEGU8E97uEmYqnKqLKC8OL2cSxDXDR3FDTImVf2ei7q1s7uf189k-IZq2r1N', 'contractor', '0'),
(59, 60, 'dj5Xn0GLdl8:APA91bHMVktyCagAPC-E88F7E-ylLBs58Zp4Pt9SiBiJwkxhv_G0xvEYt80mHhNG0ZV7byUVG1NtyIV95q3rjSM0hMZJDp3212dqUWGA0VmUxRnXOWFwKflwcTU6Z4YnwF356riDD_W8', 'contractor', '0'),
(60, 61, 'dQ3v0IyZUsQ:APA91bEHWS17OwlpVYidYTW1hm2EaF_e_7xHG5c1KeE9RVtoN5KLDqBCKl-h-0EBu6hYH5Jyv4F0FdrBXZmYReBBphrbYGvIfJvKw3Q4ZSbLNfjkROUyL_RE1YTjM1QtUa5WH6ZZo19Z', 'contractor', '0'),
(61, 62, ' ', 'contractor', '0'),
(164, 68, 'dIN-fMdeipQ:APA91bEu6GG36hSH1OLkHxvXMGl3BSiI44H4p1jU0O-1fZNhug53EXVdT5zhw4T8DmKb25USd7vfrDdsKk_I60N663bMyX2JeMS6Ql9sAS3pOxUVMbHhlkS0LLqpgnJMNBGVX-CAESBe', 'supplier', '0'),
(62, 12, 'dBtSO1YtZfQ:APA91bGxs1d5PMcym0wHg1ujlTwgimkljIxyWmDvLrcxZQmKV5f-AzGJcvvMe5xHTVUzE64dLD6wIY5mTrDlBG3Xwoyp_8T-ezXBZDOs7uoPV0n5t5zof8y3bKU3hvnc58tNKOsWePJ8', 'supplier', '0'),
(63, 63, 'fE13Xdp3hTY:APA91bEXJNbXsN252zZY-D2xLBu1e-jAt1UksKskqC4XTcblCNpxPY2qH6JhbGUSju_1UkoPg-DfHHgnzWq6deQ9lZr64Xlapg5pM5ouZNW_4C_AXSPwTKkk4D6146iSJFf2Sl4etVOe', 'contractor', '0'),
(64, 64, 'cTMoVpwnj0I:APA91bErCnEnetyovXBffDD0j-iyi23Gfxj3GVSJEEf2zTBgsQp9XwFPK8yNMXEso-nU7Mh_t3uQBt7YJJA3NEFx8bedMhX9tOwfSeiTwJbQTskWhXev0N1-xVP9z1L1mm-Uyzm5Zy8a', 'contractor', '0'),
(65, 65, 'dgHn4_if9hI:APA91bHI3GbLXNH5WKoHuFMzP3hGXBerIZp55B5lQgwDTfE6HEMBAoAWBf0WSj0AD26U26MRcUMd16T2jhdONsWQLP1wit4sFOsUjjLvDNQ54f0nr-oicg6hNaFwiiErKTyDOixf-UWy', 'contractor', '0'),
(66, 67, 'dgHn4_if9hI:APA91bHI3GbLXNH5WKoHuFMzP3hGXBerIZp55B5lQgwDTfE6HEMBAoAWBf0WSj0AD26U26MRcUMd16T2jhdONsWQLP1wit4sFOsUjjLvDNQ54f0nr-oicg6hNaFwiiErKTyDOixf-UWy', 'contractor', '0'),
(67, 68, 'cewllcOWBYE:APA91bGYi9nhP8LTRl1KZF4XpdzwbGGKAhJk6XT6exlemD3rw3SqLWOHW_ibLpBPxsTsGMc5X8FnWBb757OovdzyulmVArELz3FjAdrOQRZnHnRX4vHcrXx30OxyqnV5lewXJHpChnvC', 'contractor', '0'),
(68, 69, 'fKtIgm6Z0Qw:APA91bEWqsKRa0T9I_eEQ6ucmEMaGb1ZIv2FtL3RWMoXn5ROnsCfI4fbvcVtccRxgcU8cKu8vh5cUVaq5exT4Oji92m1FOdgxrAYQ2Kp2WMbYCnYlRL2BZuLm9_GbGytoPPaIKBNaQhZ', 'contractor', '0'),
(69, 70, 'cBqjcR3ZV8o:APA91bHz5z9LRkBrYalW13fFK9_-2FSpswESucAwHlAMz_S_h9c2g8R8wujROxeeO--gt9E9OUGhya6MDQwQZFCsD1HRXEL6ufAHfNxWvjk1_7gIrr5jVhvioBaY04kuPJn0o7S-xSA9', 'contractor', '0'),
(70, 993770, 'd7P-9NLm2aI:APA91bHd35Pw75wbqyGrlvnU4_aBZTPBWQg7TjD0yXLHdrehIIf4rKr_U9WYqMw1YPLIqP-KMXB53-D5KAdg93LLdDxSDYo5lurwQVR7ZVq6qWB03BpK6yeu50j9_FTRsre5iKqa9YIl', 'tender', '0'),
(71, 16, 'fExpGxvUH0E-sn-4I7whNS:APA91bHNDXHRQBCIWsikw9NDvkWhppL8zZgDoOnj882jET6vglLaG2bTmns22onUfszKL1b7WzQKo3xqvzbXLWo1SeaRjAyY46qZTswSM-jK73IG2AeK1-W1alv-rMLO3UTaPjxQv7Ab', 'contractor', '0'),
(72, 416341, 'cwqT9nD-Rfg:APA91bGgu9A1AwQfZEsbQbqek6huWQA7S0cNB_eiAQQnhRxT5UMrrrE0b1o2dA3X5Vici_rzcsaNbYW4nSG0TKq7HKqGauILVRgnXwJSnn9eT8feh8Xru5pIu_PBf8ZN71hnnTp1AzSQ', 'tender', '0'),
(73, 270037, 'dD748vLclvA:APA91bHDlR9fj6i-rNbCDWgwxmlU9mfUVyEh5gkir85vJgbfThs_w26l4SK7b5BVc_pxuj9zYMqTz-wFrVSIPDIWlYKO5JHJQyYmo-qeikUvX1km582G5C55rg1ebL3SLjZtvnaBc65F', 'tender', '0'),
(74, 71, 'c1lCUbuQ6OI:APA91bGoJgnhueBZ9bP0DL8YyT9ZPQDt30NhV3OJkFpR4IGl4390QW1iDbH4hn76DaWIIZa0pHopLTIf9UFaocSKs6G4lrl_5Rb3iSxBpErHinxfVsZb-I5ezA6TWXav7AUerxvRkhDM', 'labour', '0'),
(76, 73, 'e8V-mjDPilY:APA91bGuy9KpCeuaGpmmLDvLy6A0A2sirf6Nj94k-xTh1i21uiNfbR6DrhGTL_izmRUVgcrGxykwDxVWlVr42rrnXKGGXIDGbgZIlNIVAOQ89O3tnZ5SpkcRSF94XTR0HaHQNFe9GTsM', 'contractor', '0'),
(77, 51, 'dV1xh8LfET4:APA91bECagrD7-1ENpGADbKhtoagF02-HvFJ6DXG_jdlkwvFt13aqNRj51Hcc5hwiKVCvM62B0JnzLdZzdzo9DEQlPMP1kV3MSKBVU2jw76J-G4472WNkZIism0Qv9wg5ziA121v2Bhb', 'supplier', '0'),
(78, 381861, 'cQJqk19MxJk:APA91bGPkI5AumJdaqMVtwqClgYVXStUmmQEVfkHmuLKi9ucj8YX5mwkql214LYkWcn3LT4BwD0xHReZNLzwOHHCf90hjqbm8i2ce74lcG_Jjx6t5tbVv2Z8aZ1vQ3sAr1s14rzrJBZx', 'tender', '0'),
(79, 74, 'c2FTZXcl6EKJrU8GOIiflg:APA91bFGoPGl3BHFqNdd9q-mJM8eIgJ1QyERi2omzxpCYZHDmI4MPpxuBNXBpGvYmfARVNMtFye75wCOYLN4pHBtwTZXRyhKxXlVrLdGfcxMN1KoxewgicjdO6QQblezRn6zPZF3fp-D', 'contractor', '0'),
(80, 855632, 'dMQ9ySpPqFY:APA91bEBJmkHna0veuVDwH8S7Y8HVz_svVPWGmpP5FcqQW9Z52fzXMAsB8sHbbXzgl92CXu5mc0afARLvtcezNds3OPoeiMaVbGtmbegvmY1NhXnV1NzOLeReAEZegFC6o-gsZBEiMS2', 'tender', '0'),
(81, 609030, 'fcdce8lEymY:APA91bEC0V2DG1_EFj1h_wxKcGw_m5HLktdJbfbazZt0q_2rKSdun0L_gUVi_QzArsZTgllcQ5bo20zO6_VVg9qWGoMuXmmV3CNJr7FuonnH6xzKo3h5nMzSWSYhAg9bp6lYhB4uHRdF', 'tender', '0'),
(82, 75, 'e2gdOmL-mEY:APA91bGvuxiR5Ebdng3_Nt2ja01qFbkwFX4LaPpYZwcxymLrH8eMTSOWN2zVkXtffmyn8KhGfIvuq8WdCcLX_d4E7Grud9Q-ut8BWeEyODhV2QBFSg9zn0_nf-P20YbWw51N5Y9Yc_vZ', 'supplier', '0'),
(84, 78, 'eBTjOHZACYM:APA91bF_PI21rkIjNadSgfZPjVWQ30CD0kgBSemqwUZ6zaBo9RS-Ept5DkYtr4mH4fGIJ_Sm_w8e48i6UUnXoHpA3HUysK8K7Gdt1es1P0Ka6wsewHlpXrh3suvYqmBc9TKbjvY77oUQ', 'subcontractor', '0'),
(83, 262048, 'd7P-9NLm2aI:APA91bHd35Pw75wbqyGrlvnU4_aBZTPBWQg7TjD0yXLHdrehIIf4rKr_U9WYqMw1YPLIqP-KMXB53-D5KAdg93LLdDxSDYo5lurwQVR7ZVq6qWB03BpK6yeu50j9_FTRsre5iKqa9YIl', 'tender', '0'),
(85, 358541, 'c0LXkzHuhIs:APA91bHVI93tSnVh8yPbaduv3rptgWjtsls8eYTPpjyeu2uwODmfX-fWAnmj9Ee_tRkss9ny-LwiuUHhJD03zKojcV_QH18EyEzMod__WhedOorPb95ttahVd9IMGjpNcCGdiZ13GwQc', 'tender', '0'),
(86, 6, 'dBtSO1YtZfQ:APA91bGxs1d5PMcym0wHg1ujlTwgimkljIxyWmDvLrcxZQmKV5f-AzGJcvvMe5xHTVUzE64dLD6wIY5mTrDlBG3Xwoyp_8T-ezXBZDOs7uoPV0n5t5zof8y3bKU3hvnc58tNKOsWePJ8', 'subcontractor', '0'),
(87, 77, 'e2gdOmL-mEY:APA91bGvuxiR5Ebdng3_Nt2ja01qFbkwFX4LaPpYZwcxymLrH8eMTSOWN2zVkXtffmyn8KhGfIvuq8WdCcLX_d4E7Grud9Q-ut8BWeEyODhV2QBFSg9zn0_nf-P20YbWw51N5Y9Yc_vZ', 'subcontractor', '0'),
(88, 79, 'e8U0w9mJpJw:APA91bGhRWJSCOg7ecWsIJgq64VoRdsQ2RhvQBT5N65xrUaA5Zx1cu95OQc13cAgkmUNdzr8IJWuw8lapiQUN5If8UC0MxAug9F_KOtsvn-O2PcboCVh2MW2uvTP8WYhN8bIxVN7a4Au', 'contractor', '0'),
(89, 80, 'cWeVixEsj0Hlmk5CY1_JnU:APA91bGMYoEdCDWA3xEXIaqJDR6WTv8C0DXwmHZb8spoPl69-EUhfpEPXQYpDFw_jxF3xl_M8C_71ZwdFlv7CjXQjpmlR1zBsT64WhMNXrQC44aU959i2TmIOe02WZkIfjoJchu5ZE5A', 'contractor', '0'),
(93, 82, 'dMRlnEtyNUtrrkKLBtUH_N:APA91bHWmbpllbEsV314XeswUdnJwOFoTQkjeI0KHhdM1e6-mqSEwm7-MP5_4QTO26mPmlULNWXM1N8_NSMhFxPp7ZLi5dm77jv8VhkGa8tqFoGz8boGjiFnq0xZ5AKwHXbSui3zacc9', 'contractor', '0'),
(90, 763414, 'f_01L1iL30s:APA91bEkhfNRAkiQSU7INVo6Sd5-Mp0Ir1uJSyHiQrogryEUa91UZjGc7XVC5U_8NT6Wt_luTp-zuehmXZRPILlx1CtKR6EVQOM0ltBMnaiGLj29CdpUtpXjbuMxEI4yXdcrRCedOBMs', 'tender', '0'),
(91, 653808, 'fcdce8lEymY:APA91bEC0V2DG1_EFj1h_wxKcGw_m5HLktdJbfbazZt0q_2rKSdun0L_gUVi_QzArsZTgllcQ5bo20zO6_VVg9qWGoMuXmmV3CNJr7FuonnH6xzKo3h5nMzSWSYhAg9bp6lYhB4uHRdF', 'tender', '0'),
(92, 81, 'dU8pqRFe3Qg:APA91bGha6rY619jUEMTXiGW9hjI3zsAZghGwwwACWdV2bhqytVzMZDniZ911REiTlWpD_9-QOHMk6WRa7uba5UL6x15LA0ive9cDBN2Orxq2O5IAPVe1hGaMl9FdBCAriN2GoAAe0bK', 'subcontractor', '0'),
(94, 10, 'fWNXh0DI7eo:APA91bF239IyOzFRvqwt5368x9PNs5u2rtyXvlttCrU0ZytdZhaoyYrXCRLxxmqz0LoNSgsxZAumUGBkTj49PCG1o94YSGRkQ9JqvC9HjvNX-ubiBmx3f6HEbIgH9dfLvQs2A3ccq0AG', 'contractor', '0'),
(95, 83, 'dU8pqRFe3Qg:APA91bGha6rY619jUEMTXiGW9hjI3zsAZghGwwwACWdV2bhqytVzMZDniZ911REiTlWpD_9-QOHMk6WRa7uba5UL6x15LA0ive9cDBN2Orxq2O5IAPVe1hGaMl9FdBCAriN2GoAAe0bK', 'labour', '0'),
(96, 84, 'dBtSO1YtZfQ:APA91bGxs1d5PMcym0wHg1ujlTwgimkljIxyWmDvLrcxZQmKV5f-AzGJcvvMe5xHTVUzE64dLD6wIY5mTrDlBG3Xwoyp_8T-ezXBZDOs7uoPV0n5t5zof8y3bKU3hvnc58tNKOsWePJ8', 'supplier', '0'),
(97, 85, 'dBtSO1YtZfQ:APA91bGxs1d5PMcym0wHg1ujlTwgimkljIxyWmDvLrcxZQmKV5f-AzGJcvvMe5xHTVUzE64dLD6wIY5mTrDlBG3Xwoyp_8T-ezXBZDOs7uoPV0n5t5zof8y3bKU3hvnc58tNKOsWePJ8', 'supplier', '0'),
(98, 86, 'dU8pqRFe3Qg:APA91bGha6rY619jUEMTXiGW9hjI3zsAZghGwwwACWdV2bhqytVzMZDniZ911REiTlWpD_9-QOHMk6WRa7uba5UL6x15LA0ive9cDBN2Orxq2O5IAPVe1hGaMl9FdBCAriN2GoAAe0bK', 'contractor', '0'),
(99, 87, 'dBtSO1YtZfQ:APA91bGxs1d5PMcym0wHg1ujlTwgimkljIxyWmDvLrcxZQmKV5f-AzGJcvvMe5xHTVUzE64dLD6wIY5mTrDlBG3Xwoyp_8T-ezXBZDOs7uoPV0n5t5zof8y3bKU3hvnc58tNKOsWePJ8', 'supplier', '0'),
(100, 88, 'fv5No1oV2Ag:APA91bHriHTLaqaKD2EH6fwnpf4ZYH6rqk-ew_schKsFZbrY4OB18gnhduuDQcu91l0eujYFZK0pf7478dGcgF9Cz97xMWV2hSwYGMkyT439UAHStnL6jUl9-d2ct1JDxaWixaZytVk6', 'supplier', '0'),
(101, 90, 'dBtSO1YtZfQ:APA91bGxs1d5PMcym0wHg1ujlTwgimkljIxyWmDvLrcxZQmKV5f-AzGJcvvMe5xHTVUzE64dLD6wIY5mTrDlBG3Xwoyp_8T-ezXBZDOs7uoPV0n5t5zof8y3bKU3hvnc58tNKOsWePJ8', 'supplier', '0'),
(102, 91, 'fWpQy62q9jU:APA91bGWdTd8UEz1rZ4bwZLIzpp762NaujQ5RDZJE89XPmMucYwiVivfLy_CrAhHfx1KV0CFx6JykKlopuwQ8-9Gp83Soq2oCK3-Up-lu5wUjKCOGSplz8s0Rll0Wh9So38w38AN0t9a', 'supplier', '0'),
(105, 888299, 'e11_6kgENRA:APA91bFQdldMn8KTae12fvdE0f9kNeonVU3JH84-k2fppAFg3zbi56h95-ZaxVhHO5M_CSdu1AtEO0Fl4RxBbclRH3UVkMEAxqwYrCSotjuUyhg50WTMKAtIeiBZzF4yI8Y_cVgUu8Vo', 'tender', '0'),
(103, 89, 'ff6xZ2OnO0fovTiG2KYftY:APA91bFihIS3C4YJvEdVPkFG5VHf0ri7DtqzgL313PO9319cszD10K93OfSKl8FIoZ7DNTyGsSdZI_PCPUoVGKZ-cHuu-NHL3ZQ_vqnmnf3YSSYQ9yEEzIj2AuwsLbdQeYU9_uNvx9Hj', 'supplier', '0'),
(104, 92, 'dCMjFc2N8cs:APA91bHMJWqRSU0F_g3naB5qtRnph3yGvY90j17tS4sdnX-cgJIayITW7UuX8fA0Bhm4D32vlVcyycAaU0m9WImUlmAYW-95fhEhiPY27n1MU31W8jBaQ4B69glgkaBZnnCvi-AffWMw', 'supplier', '0'),
(106, 94, 'dNKQr4gHu_Y:APA91bF0IhCuls5NFizgoUVK6Vnvf2bTRb0SfIBQH4qY-H513ptTkCwYRzhLRyv5XV5UneCM1J1_aLhfetJL6B6b6yVeBq9y5pfsv7hqnQUwoxl_og7IYmPF6ZtdUM5A4bwB_07HFQJH', 'contractor', '0'),
(107, 58, 'c8Ke4CgJvSs:APA91bFLYL2HoBUwiCNGzmseGckjFBKYCB00U4vs0aRFdaAUtYs559-G-vW7UETSpZ2E0brN3YYoVdvb6euPKbFs332HR26mlkRR4QpnTvB7OPYFHV-00Yd7z4a028l4nKP3bGof9hrM', 'labour', '0'),
(108, 192538, 'chIl59bymwo:APA91bF7jdxMi1SgmjslQQ28L0FokFyRiDb9wS13kJVEQns2eklwoozRE0CDLiGwrQ6Ta6NLZgt5QsuiHlUbC2mCIpDWZEH9RyTdNRy88DvBhZ-NvGL0rvlwdCseWqQs5cVpfNAZ-g1O', 'tender', '0'),
(109, 701466, 'd7P-9NLm2aI:APA91bHd35Pw75wbqyGrlvnU4_aBZTPBWQg7TjD0yXLHdrehIIf4rKr_U9WYqMw1YPLIqP-KMXB53-D5KAdg93LLdDxSDYo5lurwQVR7ZVq6qWB03BpK6yeu50j9_FTRsre5iKqa9YIl', 'tender', '0'),
(110, 317407, 'd7P-9NLm2aI:APA91bHd35Pw75wbqyGrlvnU4_aBZTPBWQg7TjD0yXLHdrehIIf4rKr_U9WYqMw1YPLIqP-KMXB53-D5KAdg93LLdDxSDYo5lurwQVR7ZVq6qWB03BpK6yeu50j9_FTRsre5iKqa9YIl', 'tender', '0'),
(111, 953967, 'd7P-9NLm2aI:APA91bHd35Pw75wbqyGrlvnU4_aBZTPBWQg7TjD0yXLHdrehIIf4rKr_U9WYqMw1YPLIqP-KMXB53-D5KAdg93LLdDxSDYo5lurwQVR7ZVq6qWB03BpK6yeu50j9_FTRsre5iKqa9YIl', 'tender', '0'),
(112, 96, 'e2gdOmL-mEY:APA91bGvuxiR5Ebdng3_Nt2ja01qFbkwFX4LaPpYZwcxymLrH8eMTSOWN2zVkXtffmyn8KhGfIvuq8WdCcLX_d4E7Grud9Q-ut8BWeEyODhV2QBFSg9zn0_nf-P20YbWw51N5Y9Yc_vZ', 'contractor', '0'),
(113, 656587, 'dEnKvQHUGsc:APA91bGy6uiq7XKwpfFLazYMFlR7lydoXgbHI2bpQCdCiyIcgb40bVGttJjUnqROt04NJzfPmgFWA7YeoVS2yiRkwjNrm6O4ekl5qqnAvVG-TPPwWFl5-N-60vcgkAWCozlwLB3M_LQ4', 'tender', '0'),
(224, 377038, 'd9w7Dut4c0c:APA91bE5a9H63PzejmbyxN1TLQ2ynyruY3OPyLd9QGk1TgUQ2NTiIQDyipbtyVSPE1ncjEz1EfTi5d47OrttyJaQspuRGoxhfa6Qv6IkaKabf8zQsHlOjKSddx62NkBS_PszF_o5J9fc', 'tender', '0'),
(114, 934279, 'dEYrjMN9im4:APA91bFY56BemtdZI2hsoaPySEk_-WHTpCIDDqY1atw62YOaK0W6f798fnVIOg1iCSamwmdOLH72gahZJuPAeRsY5J7Sc2TUgTwibjiTLeh0LaMIksS6SivLy85d2dQgrGUtaLO5OgUm', 'tender', '0'),
(115, 936712, 'd7P-9NLm2aI:APA91bHd35Pw75wbqyGrlvnU4_aBZTPBWQg7TjD0yXLHdrehIIf4rKr_U9WYqMw1YPLIqP-KMXB53-D5KAdg93LLdDxSDYo5lurwQVR7ZVq6qWB03BpK6yeu50j9_FTRsre5iKqa9YIl', 'tender', '0'),
(116, 97, 'e1fuS4_FkUcnpKLUEwGDDj:APA91bELfgGurU7seCE3B_OrHGdsmCHY8XrLAOrLk246dXkmnnU5x_GLji7B9Bz1HMCheZiPNt9uytqyP9zHJXb_6-BPgrD1qoA_KbHgeLvJb0tqUo5hsb92uftNwosUiiQDTYXCVEoE', 'supplier', '0'),
(117, 721700, 'fmfhswMhHpw:APA91bHQMa4p5O58EXg-77C4i65Ul0oCLgCaTLHnbrJxxwAmJN21rxBZgWOcoep9yeOHKL-D1J9rTyxYzxTomUtDilUh85Q-HmdsLiANe4b_7OSNvunwRqp7Wu3e6VSjemvkDEaNxfjJ', 'tender', '0'),
(118, 98, 'ee_R2RA1j6c:APA91bFHd3Uw3Sz7G0MbeEwckYUoNyLCBnkTFsQYrAK__4FKTfhtm0uIVRPqkB08eKE8w0UV6z-EZUKnN-eqsfd_zhOHtKz4UEPYOTJV9YPSp9csgD7svoR2M4sxPe7B_ezJh-MIKU5g', 'labour', '0'),
(119, 791081, 'e_kGvCl_QXc:APA91bF8KWyaWHmdkuTnPf1hwzPPhaNDJOzME50rtOPMEZC-tkHXnyp77wL2Wq2jGmdGgAN615yAfkBoIKM7AswKnkO7Va9UNqdQlQmcGimw4fL9oSdUOo2tWBEBI3B4L9Dt_3_28Reu', 'tender', '0'),
(120, 99, 'dWt2Q6v7JE6_nhwXbq4URS:APA91bFu9nFkQraZV00pzTzmt9-8qZ-KZ3hPJgdEXsQmZbNUDLidfrt3mJ72YpJHQv5pzXvVELYtG7ld9hnNicpO9fJaVN0XqgYjzdeXFx1-QaGoBD2eJzEhsjKYv7XxzlrbdhBCgl5_', 'sub_contractor', '0'),
(121, 100, 'fWonDaQMtrA:APA91bFxS3AeAYFplZg6cqmhwq7esHjb7Mv2Y0jSNfqza7AIczw0J5Zj3mnhWR38HwnC2xyTZpUVfMhaok6f_ReF6QtpBJ2cxTfRw-gbAE8bkGfB5o96hf1AXXLYFVR8UrMvWOfMFNrW', 'contractor', '0'),
(122, 2, 'e2gdOmL-mEY:APA91bGvuxiR5Ebdng3_Nt2ja01qFbkwFX4LaPpYZwcxymLrH8eMTSOWN2zVkXtffmyn8KhGfIvuq8WdCcLX_d4E7Grud9Q-ut8BWeEyODhV2QBFSg9zn0_nf-P20YbWw51N5Y9Yc_vZ', 'contractor', '0'),
(123, 3, 'e2gdOmL-mEY:APA91bGvuxiR5Ebdng3_Nt2ja01qFbkwFX4LaPpYZwcxymLrH8eMTSOWN2zVkXtffmyn8KhGfIvuq8WdCcLX_d4E7Grud9Q-ut8BWeEyODhV2QBFSg9zn0_nf-P20YbWw51N5Y9Yc_vZ', 'subcontractor', '0'),
(124, 9, 'e6msWp91erM:APA91bGIuxVkSeJaP2KYpAT1rBi39G8j1jswX6Xz4ZXsUd70G5Xcj3-tzwCjDqCaVdZKACM5_ycXA_rPXVnsxP8-rmir1SF6D5qVCTb0YL-Y4T-E8dFaxgJXjVsFv_wXq_l8uIBmpGkv', 'supplier', '0'),
(125, 11, 'ciH3dEXTE5E:APA91bHaqZpBLVStqacX-VyCsdW-ToGZ6vko7CQGCyqhdFgsf7XWMgTxwQm-qi2yozY4Z07K4Qjj-xIx2d-1NPjfFyCG-w4ZDgdafFqL2yypvKKQsYrPZwvegCspqDLtuiirw__TeMLF', 'supplier', '0'),
(126, 12, 'cTPLSN6AO9w:APA91bFGGyoUCZcaSfFp5tlr07w7JRlhFXbjWpve7iSgJpktFPw4V838w2FTwleuTEPHU4AhcXWSrx5G_MpSSKKmQPg5-tY8qNS-j0epEFjp3NdeeOVE2ZdZv2-SqoIo5NxVe0WQPWlp', 'contractor', '0'),
(127, 13, 'ekUpC2N30lQ:APA91bH2Gq0w6BhfBkcuAvxFTyJLpBJiGxqxVbzcnjeEBjAE8_q8vyrqCKQvIQoMkSYwzl4BRI-u9PjVyC9FfkYw1aE-KAlA8lm1xjRLAk6wZABN-kIxHceOKAONIad0xpb0YMzfGBP3', 'subcontractor', '0'),
(128, 893390, 'fxpL4FntSPY:APA91bE39rJQ09nOLyG3NPLtfpbbQ6PNQAJI5FItup71wAnLOtqrjFeTK8cfLIhEJtRn-rd7DFinoyw6vTrRPpTWmf6Z_ki3sbo4-AV876Qp0tZ3CgP2RxCOoTKN2JIa0gez6zCIV0rr', 'tender', '0'),
(129, 456249, 'e__7XyQ09Ec:APA91bF1ZIl58JQphc1B2-gQT6p0gZbTNJCGR4yrkoiGOg2IXdbGZ88sGHrOUNBwq_wmPgbvX5VRLsyAFxHKCMAKx89uoK63Vzox05KXPRqGeyq62yfk-wWW4RGUDDTtRovIUHfkZ4rd', 'tender', '0'),
(130, 19, 'dFVe-wxYuUukhzXS3mPvsa:APA91bHgrZOuuH1VMAJCuRXbuYGAAHJxHYeRkVWscEsiSU8cawzdnkpUOm35WJk9n1r-wZN8AMOmPl4Q5fMlLIhKBiNrn2UjovmGiMfyVHSlQm8bbxWkquaWvl-GPfpCgMsauO1jcw1U', 'contractor', '0'),
(131, 21, 'dCYhyZv1N8M:APA91bGpWLqxe7o_kMuzJLLxrvv1VjdOvg-2oC5Z73TJ7V4nRrrQU52A-6oOjb3SwQrAXaORuDLTtWSzBLrdn_r5e-MDY3Kowrl9vMSO8sbe4hbkS7ipghiVqzcpzY2COlGRmEzdKHtl', 'supplier', '0'),
(132, 4, 'd6LpGvrgnbo:APA91bFMwYgUf3IMWaxFZjm_Oys24EQ8aGNuiMb2u4Bmahl2DUfwJJPlizOlKe8wOFA-KUIwxknnGw7__6z9G--s10EF6EOt9Y82IBjKfJHTY5ZEU6FG6jOPkB_eNqAyDJ4zeYy6KehK', 'supplier', '0'),
(133, 654908, 'ffMLWMVZquM:APA91bH_aXB9Bwz0KOjyhR8ea5hgeyuGjO5t2HcKCstRdU_WELEHwHlEpmw0oF5PAMLDl5vAOwI312OjDnAjlZM_89KzFVC7MwKG94AlB39aJp4ijuLuKKX3aHJ4iVuUnGm8ynq9Whn7', 'tender', '0'),
(134, 685714, 'cAQnmuFEh8U:APA91bEPGDnD81JjmEwL7p5I-rDz3TPoqkmorO2Th52M8I24FCe4jerx04akKqZNzX0tosBNXfCdIY0pZsxpFEgyI3orVvVnU3NAL8bU8SjQNbjKj5FV_Jx9L_5eh3jTmbIsEJJZ6AZL', 'tender', '0'),
(135, 531216, 'csmpivW4i-o:APA91bHDjS3xG544ZBlnh9eE-b8keEURUKK9bugz_u7CLUbxxBqaxQltgcOs_D7m7MOzloqzCFpA3QB1fO4K_HhmUF9xnee8CskhdyZtFOzLIznFbsMCVu310mdEeqBHEa3ohsUtzC2W', 'tender', '0'),
(136, 951426, 'cGYPKhTySNs:APA91bEhGV1Hw__4ww2ZrMJATLDpEZ2aKAJHBfEBInsbSd4BWInvzRexBc5GdSafzvGd8j-_iN8Iqv1854QP5FCMBVMcGcG179BZ2Myh7eS2Jb3qxoDLE3SQqr-uYw8m9WWKxTTq7SdR', 'tender', '0'),
(137, 155537, 'f2yJs_8FLYY:APA91bHkseGCj_iMTEuUgiFNblVBd566dAgK3hMsi4Dt7UX7bFxINoxH9FcmcOvAr3bmHISWXp2WgRRFjzK_Ef_IUt2FQjv1JIFznBdk61IrJOI0wLs8gaciE2kOm_566SPDImP1xjbo', 'tender', '0'),
(138, 34, 'eSp8sFTyXnw:APA91bGvKOhO5nIc3CnMwRoDnhQ5ckIXtnwGA9PFpS4nwfVrWsy7P-j2NIr8YhBSIRtn6OXc9IWlg6wf2xqX_4tMWfZMHQbpbFvrj_87vafJhkGhFZvAN5sOTITcIeGSf5DRqLQAt5Zf', 'contractor', '0'),
(140, 418588, 'ddY6fkpSU7U:APA91bGz0K3SCQo4nUdPyQdvryN2jhV1IbAM8B4mY7904JYghMGOKA2KIj8a2f-BPzUWS0u8oH3IzZDxTMcG0gxDSSWIVOge-W2I_4z8INUbgF_I3hJEeB0WPXVT3IQiByyW8p-MDYjT', 'tender', '0'),
(141, 328670, 'cleJodGd2Jk:APA91bHFS9NesVUswTr9449SbDL9ngInXvp4BptNAa1tkrmLI-xNuJ4NOxCrNUC5sUi_hEQ7gszvXp_mQD4W-4LuVqk_M5ronaS3TH4w8FYN1pGx9ya5f7piTBLLnA2FCLxoY-nA3Hc7', 'tender', '0'),
(142, 257301, 'cKjiKUs6qDs:APA91bH1niX-zxjyh5m6sc-SrnJ6TqWc_d7VKIcvFDv6hbF1JBm-jjLgWMMIUlpksBXqj-XwdbltK_bOZNkUmrEBbVFabdjeJFgMYi4GdQ2rmWiAcPSZlbrMc71iVP_QPI_5xYOjnfM9', 'tender', '0'),
(143, 36, 'fl9089RrIvM:APA91bFHoyqlhunBpUJOQfU0Mba5dYOBGVdPeNVey8G7Q8ZOCv-ckewAM22pLgk6AKfueCOILFfFpK0cOPTXQZleqW9vVqNE8iNX3lCLVo32P15V_vOpbvdWFVV31m0EJGqkTRtaVf0a', 'contractor', '0'),
(144, 510168, 'fyKRq_9G3q0:APA91bFodI1Zwra4fA58w8ZpFmceh7myAmKgaPRsjMPqOQ_-5Dl7Ot1jXa2A_O-djOVRlN73LRZgoL7Y0a5-pvzUtMsbSWCWmEJttJrIMepcn4HUS22Q6KQLw5fV_mCUb5C5Qu23SLSw', 'tender', '0'),
(145, 337259, 'eoyIUMzBHMg:APA91bFe-Fu4M_njlpjn2g_hZ2090A301pOmPLDxtc1rmZbESIdQrcCVBQ810-silHsUG8bfk8kD5vDd-WlCkVrddEQKOnsjMy_erUy85wIAQpgDruCkx5p_1l8cDHJCu9RrkEK8ZOaS', 'tender', '0'),
(147, 214521, 'ebrpY61l3Gw:APA91bFZ4JBASnIys3vXY-cb41YipO8EkDPksqON9OXO5Rtg7X7oL9kxhlubW-jnSl-lrjaXQv-ZK4J8dM5-RkJ-QRVkyu1C0e-jldKkMRMdtw2DSgGH928kwGBhbz6MqYALGII1CeeP', 'tender', '0'),
(146, 799555, 'dLJ0gOXagxI:APA91bHtmTB9ohxvUuQp722SjRcGQjEi7uPqrwkkhGEaBbIcolZ7qVaZYImuNJPQfgPntznm3ngWjH9SbgcaESMlzcD9i8PqSI-mvZuxhQrBtWT6Vmm8XHd5p9h7t97N2vmgmYwPCZZE', 'tender', '0'),
(148, 185398, 'fAQDmsmA_EM:APA91bFbI9eaiQ9zh4dRojzrJikxWEANKGHf8GvJxQNvDdMOtaGv3JursTZXuQv_RYL1WMNoaounvtIgns3HdlGXfNCpXG9uQ5z2WgsDGtty2BlafwE1gJaBeXk7RmN5FcengVKZiPdq', 'tender', '0'),
(149, 957207, 'fZwDgGFGlrU:APA91bF_6bPpud5m16B5fCz5nGIgxCaTX9pQJdIk4FkpovtLTtnEXFjzdoMBpDpQfDh35DugMKtWPJ_7uaNKffn3BIfo4i5RiFHTWie3-Z7klvncg3I8tg8jXjXjAvhBRoHdKIJa_9mL', 'tender', '0'),
(150, 41, 'dt0AuUoxpoc:APA91bELdjLXGkVVhDuSfEqXo4X2NcVmS68s8roXXcCPnnAqAtdziii2cOYcAWSTzakyQxSEgYBzbvqi2_3C8rarlAPs0gZz4AZwcY8j0nw4p795NC-f8ggSVEDYKKe_hKoYh_1YK1SD', 'contractor', '0'),
(151, 47, 'dPTPuGlM0lo:APA91bEnI_wN8dikZImH9736839SN0Yk9m3H3H-iJH42HKFAgcyQSXFYFhZ3_PpEaZO83lbL_Pd1AB77RH-uRNAkVEdAbkhHb8zCMl4cLTomRwBJ8jXdqiw46DFPqJqR5Wyxy8lKi4UK', 'supplier', '0'),
(152, 48, 'cUFd2ZevvH4:APA91bEfiMxOWO_JyTf9ieDJ-AVSA-XiC3ncVpZ12VCt_JlRpGxSKIjLMSzAC4JrhKaR3FSwtL7rf6szH7dC_DctUe4mUMJDrVPSIsMByBMVNRPydUzm92s7N9cERRRhPZA14yQNTL3K', 'contractor', '0'),
(153, 498878, 'dpeJB68vd94:APA91bGPK-7bw-CHu5G0bcW_cxM32xlRs-uTQmTHGMuS6Qgsh5UWdbx2Y8lAA5cQgDV_jc8l1Ua8vSOH9tugTNJ9Lt4_0aX5FO5odun_MScWUWKyEdYiy1JP4TuctLw7pjG9e6bQeyKw', 'tender', '0'),
(154, 166901, 'fushgB5pw0o:APA91bHMc8zOAliOYi5U5GkXftp2qA4oO06ubQJ0LtVIg0DeADboPeZ0zcfXiJmaKLtdPRMjnm1KgTyNv_aKCLfUKHqhJnLb1JrHHFkxlGXEP3pRBIVdqUs1yOosD3uTLpFKgfBqnZK-', 'tender', '0'),
(159, 768547, ' ', 'tender', '0'),
(155, 496939, 'f73rAuWP3-E:APA91bEDPnCm8m_uSddI8PCwq0oMBU7fFFLtO4NiQpW0jzq3THjszmjI7F1gYKmhNO3-A7B9uxENJWMeqG2iPz-iN11P9r8WoG8xoNaLIvYsMdNFYCFYz3XgyFDEAkt7OiHU3iTFIqiN', 'tender', '0'),
(156, 630428, 'f_9dERWWhR0:APA91bHJaqxc8yC9creO2w_IwIZElS_I45ywG4cJz14HPDkFrLEoz_7rvzvCTYeclr1zRNwW2eGguxTsK8BB-gwyY61CxlmLMiyHLNJf1zlz8D9CRAiWERIlI04OwDrEnzjy6iq07bUu', 'tender', '0'),
(157, 52, 'e30Mh595NcY:APA91bFLaDp5URSMkE5yXhlVbGsZhrfC5tqFvnv2MjtFtAyMsZmojC4HXIhsm5lzs2UMlpKzqlu1ky-hM4LeoZvWRQeHuFfMeakGp2D2-tjRLz2tFjAWWmR8w--EJq-JKoOxJ-8F78Hz', 'contractor', '0'),
(158, 55, 'cX_dsZzfnP8:APA91bH8V213foBFYo0i73OVUrjcTeRydlkyELKEyipgUw6-64TtpwSGmVac_k5KsfrYm07F6yIZWglkk83MwH-QyeDyCDbYpIqFJiSzsVGSth_UViTnJ-JTQc0IzMcKXVeUj0JRbLFn', 'supplier', '0'),
(160, 59, 'ctYeskZezvo:APA91bED_zBfZTxW3r9OtVzhduadxhEjyIPjuYEaAnhzTrUGkvau-v5sFM1xq_7fvMLMGTld0GwxxhLyxFbJHA_B2RqpohzCkaq0T2pl8bf65joZyB_XwQWuk9PkGho5BNeH9P6KsmlA', 'supplier', '0'),
(161, 121610, 'dR-1fOJ9Rgs:APA91bGCyNyyt20OArjTrGFdakAG00eO9MjWObGCtr5FfOh3tvv7iPUYlnaxs5SYZv31qnNPyUo8qBf7Apr892p2Q796OjNyqpkLJY1w7igCoaZDxCD6YLI6IWuA2C4NQy4EGgkgBAAC', 'tender', '0'),
(162, 61, 'eALPuDa0xEU:APA91bEGpo_KGEIsJHfM1nHyGQZ0GLt112tFBhnl9ElIjzFzCAf453dUJtiamTK8owUR12w4LQK_8Wyor42gA6p1Quv4Bi0lxlWkolEKU32_YETZ8Dktee4An-BXbI6e45yApur804pJ', 'supplier', '0'),
(163, 727786, 'ffa-UYCCbwY:APA91bFPA7COKySX8UUw7osbvkeU6Oy3r_L6hoB5ldNKzhknrK6rtNNw6P-2jgKv4g-YxFYY0Sjsaw1iHulxEPFjlbso-X7CqGmaPzVCVRkseVXecZIAVIrLJKzkr8PsI7qdiJJVaaiI', 'tender', '0'),
(165, 718358, 'eDf0J05eZzw:APA91bEf9fuBYi3aC33lDho_3aAt-MqiCjad5LsKGfjd1mx6SV5cNEJDWi4ys47UG5iitYb9H_wk1Es_G-ay3zaZKeTsdFzgYniCaR4p8d-dqJ3guo4S_ZzMQqQRtoveNiLYnPvEM7yf', 'tender', '0'),
(166, 75, 'fTGG-64GXOE:APA91bEMkPtLOZ5CXCmAd5Wdqo7d5oLMLU7BtTTUKUF45tmeiSYVqoqZl1-0OlYkkGX2FncLPW_qlSGBrYd7kctpd-bSyCZHoxMR6wWzpqK9uChvdnIx6GHaqPamQjEScYSh55NDfjzg', 'contractor', '0'),
(167, 673058, 'fddvaK7nWnE:APA91bGrOhEULjDrEdcmH-pOHfuzw1HUU9KFOzpU5q_LR5Ypo8r1n5qdDwO3-6PCxKQQ6davdvXE_T-94M8JE5JUUoMl2PWrpf86GDwoLumyO6wNaptGWu49ZZKPp0E49Zz87av2vAxC', 'tender', '0'),
(168, 189367, 'egQSuQgYtzE:APA91bEM3zmQ2mHmFODq4c1mav3GBoiv3t8aFMY8-UDSfMQS2b0METW9smCJVI0DSWAWiFvDFQI1cFbUQtc5jTSuiSlmN494MyfttbMpCK_7PVydAFkyvW9PUYLUnS1TAYi8Fa31stlg', 'tender', '0'),
(169, 341838, 'dM1C0hJ5Fic:APA91bH8qsVNHlYmC4MbfO8txQyKUnEONc-vKVsuKBoShUwOMV3EfNhneM2wCMa2X4PPMiFIa5DIi0jGCS6fU_V_mRQZ0T9HsK_s6R5b3_jn0xeWCE_YJ81Uikqf1OJeg0Z-TJ0VEWAl', 'tender', '0'),
(170, 81, 'd-pXHh--Za4:APA91bGrooYyr9wBgsCT4QVXt0FniUogl2A-f60lWtue-WLvUCWX2Nbtzb1UqoDRL7rOuPB6uZlNQmJOt_Ooiq6QerBmeL4T063jGjp7lahdwJPgpqjx3JZwDV828tu7DPKjTWgzgmM2', 'supplier', '0'),
(171, 561958, 'dUnFxeFMLa0:APA91bHcCqvVHwRIA7O_fV086OT2_yWe5HSTNDiPtcr0JpYH_LDslg1goa7qNdH3KWdsgxNpm-O1kDKIxWHeL-T-W2BqoI2aNzavvJFfTra1n2LL9qpwYeVkDvQN3j9uWN74EVdNFiMe', 'tender', '0'),
(172, 584097, 'dUnFxeFMLa0:APA91bHcCqvVHwRIA7O_fV086OT2_yWe5HSTNDiPtcr0JpYH_LDslg1goa7qNdH3KWdsgxNpm-O1kDKIxWHeL-T-W2BqoI2aNzavvJFfTra1n2LL9qpwYeVkDvQN3j9uWN74EVdNFiMe', 'tender', '0'),
(173, 971574, 'c4oRvLA3Z7s:APA91bFhGaHolezn_sOxSV3z2IhukSHIgTFxrZOPRDQ3_sFgUZLawmlb-AX1ED1zlJKIDrwLnQhCxZhZExm_zlgznJSfq2CxNY3POnjehvOgdc8_mJaI0fBXhgrsmjbZ8gUBOZVTDDI8', 'tender', '0'),
(174, 84, 'cGwNEvFUAUKZhDmrJs6wCO:APA91bEmeStwYq89XLsbnBUacSMb9uhbST3q_fKOpAmVYym95P_5ApeSOEztttbcYY2I_tQgJsq3hGQc9N_c4IENqz3ppIiJysDpisDI5eVf-5k-gjNf9d41NjpSldl35kMQ1X8d11al', 'contractor', '0'),
(175, 355324, 'cjdyoeexkvY:APA91bHT0Ral2jtsRlwP5AqyZsT6JVMnTZPYgeveJNOpCa6kKtaMo1aDXupln_VoeAUWhUid-0ZP1Xllkd9X5Q9N5PAwjFL5KKCZRJ2TmwRGHQd39Q0cE-o2NNC5TVWafr4eiaRuVlbO', 'tender', '0'),
(176, 88, 'eLiwG8FyZiQ:APA91bHEEbc4EEPd_fVu2dZBs6uHS4kkp8_hFc9NUnY0h-RBsmLpnvRHXv5tMmnjS-sGMfOsLvSHPhyudY4-6jGU58Jmjv9O7l54iF2pzIAKfdmHZiKorDBTGljSKsm563PXhFh3fxL3', 'subcontractor', '0'),
(177, 841906, 'eg68Z0c6wvs:APA91bEs8i-ZLHroR_htYq26O7l_k77M4xxjD7ft5Q2sUWVQSjP6JrmKO3ichec1P-IR2v0eNnyKFxkGizgTgFVslyJMKNqIBiXzs2SBted1nW4c1PAxf5AnfXOmJ1DZ2d3Xrel1cc2R', 'tender', '0'),
(178, 834841, 'fQPlz8IKCW0:APA91bGiSNBM561pxVE83PDMvlh9U88uDW_rvRESRHPk5qRGvYs1feN_HTIIUF0ZlsD1Yw9eQCsarAc6Yy2v7s3x5xFrcazHwLtOA7-GZ6BO1EMLHifDKLAJasQyDG-_XZC5mlkpNBLi', 'tender', '0'),
(179, 97, 'c-1dR1fsDOc:APA91bGmBijwhXNAVa0B93SOcoXY2MSCCZZ7KcKf_AczmEv6LZm1FmTzsfZIhR2TvsS6wKxmDLkSg8HAwvcgmgCSkuWa8OJG_zTrSiRY3Zs9ygt0-ZFjzaH0sU6tN4E991KvNdlEnxNP', 'contractor', '0'),
(180, 189871, 'cKjiKUs6qDs:APA91bH1niX-zxjyh5m6sc-SrnJ6TqWc_d7VKIcvFDv6hbF1JBm-jjLgWMMIUlpksBXqj-XwdbltK_bOZNkUmrEBbVFabdjeJFgMYi4GdQ2rmWiAcPSZlbrMc71iVP_QPI_5xYOjnfM9', 'tender', '0'),
(181, 99, 'cFHqqE40jwc:APA91bErO9zhu5Nyo_RgXWdOTxz9iU-CW7FTwX7iFMa3cQjWeKQmBTxQ-ZYe5uvnkmrtyaDMu97gFulan8yFcVQZSZyQiDXtufX5omW2l8bcSPPygsrjETWTRvrfP3rVFdbnkUKzJpnv', 'contractor', '0'),
(182, 43, 'fxyAf_pfMco:APA91bHKCaAgMsvcCCFggxuKYOI2mP5SvCiZe4zA_toq45gEXkkhvGxXfZ09fxv1SIYdna5AXYvXNg1IXARF91lXsCeqBxD-HJZZNSwqTkQA5keSScsWX1dXpUPLYEZi6L4Ns8arPZ7S', 'contractor', '0'),
(183, 100, 'c6XiFY7wE1g:APA91bHQg0xnrA33tQsK1CrVB4DCflb8Ob1hQBHTIQl50--LW0fpeE59pLAdZ1_sm9un2FcJcru4LRSgqcNNDM857diOD7E4n6PzX-eAQD6r7sty5L5SsQ7cRRX5cQ5bORIgZX4enSir', 'supplier', '0'),
(184, 101, 'fNefujYXUUjnhunP4ALUvB:APA91bGIwd6T8C6PgGAxUdjzongU7ag2kddE3WcayPL5VkrG2BpQYFydyTQoAZNzogF3Rm079l-OxxErnCsdQLdaMmXM5drEX1bCjxuBQrorrMIbbknJRfW6uGnPTS_khxRwjpFpAi6O', 'supplier', '0'),
(185, 103, 'cNK6c0Db70zxkmCZVdTMPp:APA91bEcTt3pwFOwKHT9FDlrE2d1ndg_0N2JxvCwk-9osg5JQHQ8adkEQRRRaLOTWWfFpnhxTUE8_z59CIedFozlHUDAFsg2wN87eCACcN55DTRSbIkvpaBeJmvsqeCspxYGAzMR054J', 'supplier', '0'),
(186, 334990, 'eykefdGL6Bo:APA91bErtld-Ro-M0vwwd13YXvZVczhKPMl0GycGUNSt8qDMb7xSkmIp7I6DRD1hsdqdgwJR0JIoNYEpLJvH4Y1R_7S5rNRS5bnJNzANAUUF3yF8Dhgq0Qp7D8Y9wLqj2scArBezctMi', 'tender', '0'),
(187, 104, 'daWIk1nclDY:APA91bFveff5S3nI4wF29hcgJqVKvfazTi-RYodCOU890Y0lKWAYNLTl1Dp-NYzC9Uz6QUn_J683B3xR6tDobPLN9NSXyCAOU_4fjGHCq-TT2iJKkGVrjcTNWGGaMKCHC9FWpkCKIdcY', 'subcontractor', '0'),
(188, 225977, 'e5G6EnVAxKk:APA91bEpbLk-i6jXdlew7Ai_1bLTusCnbn5izxyqaQQY6FaPysHAZ_Cz4NLxy6IjBzecWPZHDxkthykdjo3xhhbnZR7RV8ZW6Ukhx5c0tFyNler5rdTZibskV0AVKGuAYIbGnoqjoGrz', 'tender', '0'),
(189, 577202, 'e7XSOGWDz9s:APA91bFVihkrj3uXcyuNfabLJGcxHP2Re1v8ZvOB63HVQBYzxxq9r5LY2kC3V18DtGl8fBCtnNm8WIOA-kGhxdk6E7wuqJwwkLrJKFsUBVgB8DbGXc7ZsJHsyujaLsSEQylfQXvOBVSR', 'tender', '0'),
(190, 373590, 'cXGoZJKozK8:APA91bEUXO8ZIa7o5Nz-7a9yQpOagSADgNoroNkUSGNlqJ9T-EcRy9jpUrQAIgoyCMP30KdDTbAY984Ouyjt_9u4Ex0w4r88PtPMEHaIr1ZBhtepu9Dz0ght0IIXe8stePT1mm-k6zLf', 'tender', '0'),
(191, 106, 'cinoGtGSnfM:APA91bEQ-n48DP67cr3Y9f__EBMurLFYlJ0JJkrtoNdEYkKER7wxeB4hTBfCo77xN2a8dGoAeRF4P5K_rrMPI83tNx-KrhM0zichCNWvpfFI-qB4eXmmK1Gdsn76cJ7kgjS5M9RL9bD9', 'supplier', '0'),
(192, 436241, 'dgVmO12t0Kc:APA91bEfsJ_l4IiL9ugpNfpXm-7OUrKCXdMOVstNkR1Km_OS4n1jBhEkdTbcfF2poSkYRgcKUpRRyUVi3IDRc-nS2uszTySvSwoswW2F0o3AF0eNSNen2yzlvyBJAHzGOjvb6ezlyfln', 'tender', '0'),
(193, 109, 'd63RCTCZGUYwpLQC_RLDsf:APA91bGPDee8CdOYKWu_Mu_LwnkOEgoFgNxO0dHlYhl2eoknq7wt5Xd6p_F5dzcHPS_zmJX_9y2sRP_G-Hq3VMpo33qjylQeVRLN2IQgO9xx0Sgvd7I6Q1p2ssSFjGJQOh4eAsPi5Bcm', 'contractor', '0'),
(194, 117204, 'dNRpL73j73U:APA91bElRna3kkwtVsUDeAD03DLPobnyhthptKf-EMzSsVVK9hZKDKTlxMkShcMce3B7fldjXV8mIT52XWXtxygYlZuH-9ItFAbPcgIsURzbbMX7GzIXqvJydtLrDQFC9eQh__usaaRT', 'tender', '0'),
(195, 704672, 'fA16jUfj3NA:APA91bEAXTXNdpozvQQFagm9kA9F61_w4imQtyw7MgI3ddnCk5JtzAavpvG0cM5CFwNv_vxUVsCkc8uGN6Vt58nxe-641usIamfy28gbs5nyxKf34bsBn61DmpPMRqS1v-K2EufvBunq', 'tender', '0'),
(196, 110, ' ', 'contractor', '0'),
(197, 113, 'ethmjlcuFjY:APA91bF8MxzuQI-G-8qMm59rXI0EKhGh8ty6iaclCW_X9ffIE3hGy9dE90US5qGpus_2c34gWef9P4n1dcP_pnzJdACrWd-9S5xdW3bekXRN8y3Pxbisz5GAMMVBDnAaV75QiVo70FF6', 'labour', '0'),
(198, 112, 'dTvnKMtoDaE:APA91bEGhfklBA9kYpYFv0hBCJNGCZoP8UTphuTOXqJjSaA4pVDFLBDryIjYsmBR-jDHnHzVN7nLl97n12J-dfAPCnV5Z6mGTJKtLf78Z4Ld6O-9xc-DSsGagUhUAQ8SLlSNHJgKPsGp', 'labour', '0'),
(199, 119, 'd7l_nRFoxBg:APA91bFsRbQdimXbyICpaSmWtRSu_dgHZjum5WTFMkywTYg5mxf6Zfoy41rSxqg_ygHzC-bFl3bD8idQ6YazXqt6xm7tQ2BOsnc4I_RiuItvW-GDEgTcii4FWItNAIfwC5d7REilUbi3', 'labour', '0'),
(200, 121, 'efehwIoClHY:APA91bGjgK2SeILjglI3UYiWFkSYgJSWrqaPLLMiUP1ThqvEm5_KA8Jn0a00BHShPevpqRyWQjfWOP7HPTjshdIAMrwssb5_9-11UkPWGhfV7CFJdAZ1Ykq0dTOx8iXcghPl3vAj2RDe', 'contractor', '0'),
(201, 690244, 'eyDPoxCfwMc:APA91bHK0xSPRY93tauTFA8DhlADXfFFbCR7Ulbr2CVEtmlqQLn1GIh-wm7LxtMFkIWQfnA3d-DJm6Nmw2UFLe5rU0X0Vt6JYACcxlK8RT2RhraTWbjoPJ8OZtEfyVfnG7vNic0848Cw', 'tender', '0'),
(202, 122, 'fDEDSNNrbDY:APA91bGlDD65ytWjURB8uh44c0bhdyUTSi_GecBqFYHXw3zkdZgTI9Kzh1TFcRsbal2WtP5GCwbB1WF3W2z4wKpw-ceva1OufpramQNhPnBSFknU34xF4TO7azTOdzpi28NhWZs61Ix_', 'contractor', '0'),
(203, 639013, 'cy5AXKeLklA:APA91bFe0qD9hVvwRRaz4QEqO1g7LxOsLacRR3FxAWJq3x82FZ4DXY4pTUSaAjHax3fyHmA-QHiDUFWf9CjV4Z5tRWFN36aXplUP1dreCGzxMWISUzwrKCAqZkMXMy6TJWtlspmsDGUW', 'tender', '0'),
(204, 123, 'fYdhqCq-GBA:APA91bHg8cbEeaFZuT_fYfYHi4voBdBhT8-xGGv8YGLU9s8BWiHA8oGLYGlD0ftW4hSl3D1WPnINvRPEVq9OWk3odEEj2mNXllVMQQNNEevZ8BY9VQ7IT_kjKMRCz0S9Vn0sZCFkVMfU', 'supplier', '0'),
(205, 124, 'fppzq8jOn0D4tKSQDkvYR9:APA91bHI_bEaC63-kr5CNo8VN31bym0ddU26Ropxhj5kf4W0OL9_2JVXpjyB9XTLYQJpXxP8SEnIPQ4ypIcfMMGQ_ZC29xaXnjYLC1Y1EhtGDWRu5eedPIpLMqd-LLFKtHAp-mNdQT9z', 'sub_contractor', '0'),
(206, 992553, ' ', 'tender', '0'),
(207, 182096, 'd9akfB3DyMM:APA91bGzqCi__Dh-e1mfmHgZyamW98ZLgMdy-8LnKpbz0rFCnAd8wwmWheeO5P3B6WUiMsKr_6fYnfaLH1YldGvdeJh6y50LyfC-e4QKlhRFmcNqbtClzaStcW82T-IY5u52WFxuP1N7', 'tender', '0'),
(208, 694524, 'ehr85bEVPpE:APA91bH9547nR6fjoM1zq1DEUyMJisbhYdBqo1S1ilukXiNmriQKeulqDd1I4jZ0dtUc_imjo3fDLvX9qp543_iRWXXo2GGRvOZEuIp46Vq1Z5bGBD6dGUe1JCxMrZyh6iCn0jDX7GU2', 'tender', '0'),
(226, 939480, 'e6d-fQqtBO0:APA91bFPBLiBnL7380XHH-fUZdZrc9kzqgu5pZ01cXVCMPuAH_l_Brk2cO5kHfgof8zkgk9kv7pe5YagyHJ1HDLpIzS2EQNf8vMBki0qwzk8Drii2YbEgPHFBUtRlnv4kqC1tRuTA8mh', 'tender', '0'),
(209, 125, 'd63RCTCZGUYwpLQC_RLDsf:APA91bGPDee8CdOYKWu_Mu_LwnkOEgoFgNxO0dHlYhl2eoknq7wt5Xd6p_F5dzcHPS_zmJX_9y2sRP_G-Hq3VMpo33qjylQeVRLN2IQgO9xx0Sgvd7I6Q1p2ssSFjGJQOh4eAsPi5Bcm', 'contractor', '0'),
(210, 833732, 'ePucTncW37s:APA91bEDtN1nu6ZuGgxWj7n5eWbdNfm0W-Ks0FRf5qgTALfsXWeNAnzWRJ9WW-7DX_SDxiBEyutW8gR8CGHmN2PZ57yPjZ7ywePdeIISU8IAJloDFi98PDIZ1zrYdBFlnTH4IuPbBBO-', 'tender', '0'),
(211, 33, 'cV-mi8CBr4Q:APA91bEiWvJI7VvZl2JtGguIH2tv3F-zEhvdW36m05hjVmCWWjKqx6MdOO-9oZMxBwERI7lBr7mQgg2JFniGul8Y591l-hzP-yFLZ6f8YoDRyVytrNMqOtI4VRdrEs1sSYKd_VCb0FHl', 'contractor', '0'),
(212, 127, 'fl9089RrIvM:APA91bFHoyqlhunBpUJOQfU0Mba5dYOBGVdPeNVey8G7Q8ZOCv-ckewAM22pLgk6AKfueCOILFfFpK0cOPTXQZleqW9vVqNE8iNX3lCLVo32P15V_vOpbvdWFVV31m0EJGqkTRtaVf0a', 'contractor', '0'),
(213, 128, 'd95Cm1GH-6E:APA91bFU9yvdi1VZgD74GmFJojbPGzbcP-2L31YsTsK7sDsd-o3IYxM9Plgb-d13T03L0Y6V8KHe8PrNu_2UnOMgPIeuvaAF-QDDY3pEvwAEG0AZK_8r5IeT2h9wnb2YgMh6mMzwXXG7', 'contractor', '0'),
(214, 196125, 'e1CFyqvc8-U:APA91bEcHGiLGN3Gw29qosjnAbvFFY51IJLnAehYPAV6HZOuNvOgLdcI8pdKrSG0sFGGKc3ivV51hTLQ3cSuXUq_MDZxV0D88VD_YgeSHzM5rOsHEe0s9z9SpoSlRQvFJKdImHnsvkXX', 'tender', '0'),
(215, 129, 'ePt5wb0q77s:APA91bFVRXsdMFrZrEES8v2-gZuPs_-RQiYkIJDHVN_QqjvIhf1qtMOr7Og3XABqP5NV8_SDKDbPHazmsNrvQsOXzpBh59cBkjmPc_4PBUoBRWoiaUeqTE48Ja7sz79JJd_6IXIVliiH', 'subcontractor', '0'),
(216, 130, 'fQxPou7bJb8:APA91bH2Lvbgh1AX2C8Hd0wVU_HZuFuVTYwFPodPfAchhzbzVCchQeWJJJUCbVluAxklgnKkM2jb6B_qY2tygk3BhIgIqxRFziVtMlxbZZfxxUasq96Kc3FD7lDmEmS9EpQLnfMzydyL', 'contractor', '0'),
(217, 132, 'fQxPou7bJb8:APA91bH2Lvbgh1AX2C8Hd0wVU_HZuFuVTYwFPodPfAchhzbzVCchQeWJJJUCbVluAxklgnKkM2jb6B_qY2tygk3BhIgIqxRFziVtMlxbZZfxxUasq96Kc3FD7lDmEmS9EpQLnfMzydyL', 'labour', '0'),
(218, 133, 'dNLYNacQbJI:APA91bHBnR37Z_s222DpAdMzlqm_1PjxVUFZnRpr1wTlp7jvaBoJEN6eigRRYekqakBMbyF0JpFFr_wBL0DMZu5fYWU5PUFg_D52yR86S6T3puuW2AJnYLRcInAggKkA2fEgNOoWlbUa', 'labour', '0'),
(219, 150698, 'dFf8QeA7ytQ:APA91bGYkf8alXLHSoTOOlYeDQBGTi8Rot2Q4dvY3FLZbd5QgLqttqhgc9PYE1c6gTsiC1pYVpaWfyoHKkQkw1cBQkeXcJ4AeWK4he11uwryDX262GHvwC7CptSflqsqEMdyo1vBk8bz', 'tender', '0'),
(220, 783240, ' ', 'tender', '0'),
(221, 135, 'eBeUkfvx9UuvoPaKhCAWZ1:APA91bGSmmNi1cDdkVGcxNm_kYPM_4BsIBGWBiG3-KFzAarLNUHMFGSr42qEnVqgC6LUfqJSNlNuHP56BV6dpVOzgv0Wy9TZvwvBMn6vQkKC8CSmoE-0Ave4XJ6DzgQ9NbfxwbbfpJzP', 'contractor', '0'),
(222, 136, ' ', 'supplier', '0'),
(223, 821747, 'd6Z9XPgP6z4:APA91bGYESb1UbUT4IcOtxz5fF1KvkL5mNxgYo7E9II9MDZWHwTz0Bd2-2dI18G2VzVpwHLNjF3rDnoOfZL-WVtDNeEn9mXGwYCj1kD2tKQdZILBbpOiJX2qFUm9aKZyMdae9-pW9lce', 'tender', '0'),
(225, 729413, 'dNRpL73j73U:APA91bElRna3kkwtVsUDeAD03DLPobnyhthptKf-EMzSsVVK9hZKDKTlxMkShcMce3B7fldjXV8mIT52XWXtxygYlZuH-9ItFAbPcgIsURzbbMX7GzIXqvJydtLrDQFC9eQh__usaaRT', 'tender', '0'),
(227, 137, 'd63RCTCZGUYwpLQC_RLDsf:APA91bGPDee8CdOYKWu_Mu_LwnkOEgoFgNxO0dHlYhl2eoknq7wt5Xd6p_F5dzcHPS_zmJX_9y2sRP_G-Hq3VMpo33qjylQeVRLN2IQgO9xx0Sgvd7I6Q1p2ssSFjGJQOh4eAsPi5Bcm', 'contractor', '0'),
(237, 147, 'cPFUEuBFk2g:APA91bGwjDUQ85jIb03clSjCcCCRtj9UF3QQEDWIrFjwF5w3UaKVLtHhLjxkoasmvJvYqMHc30WUnJKhQC1HGYcKajoao9VYEjooX_y5DxZZDF_0DZkz1nZERiuDINwWE5iS8IulHIHb', 'contractor', '0'),
(228, 484051, 'c1LFB_Yjs-g:APA91bELetJGlDSh9KF0Y8vdr85pjyfsGjGN7rMNI8B6mESG2Z-fsOlTs1eneTnO3Gn55gO-rNHeqlThd2hOZPDrVhW3fwuFydFqaO-m2wzvwcDF9K3qAZ-J8925J4r6Fxt7xazWu6io', 'tender', '0'),
(229, 950297, 'fioWcuNAXGM:APA91bEq9mZ5kTguDNsUu4z9o1llh-oCXn6aohf7-JhQGM6TSxGf1z1LfiGxz_bF6GJWwUtt_xWTOCU3CAhwV-h_lZpd3PS42KLV_RkZ7mbXMUgbToatDf-UBPZS2_ZqI3Lso2cRpJ15', 'tender', '0'),
(230, 425408, 'cGYPKhTySNs:APA91bEhGV1Hw__4ww2ZrMJATLDpEZ2aKAJHBfEBInsbSd4BWInvzRexBc5GdSafzvGd8j-_iN8Iqv1854QP5FCMBVMcGcG179BZ2Myh7eS2Jb3qxoDLE3SQqr-uYw8m9WWKxTTq7SdR', 'tender', '0'),
(231, 141, 'cNK6c0Db70zxkmCZVdTMPp:APA91bEcTt3pwFOwKHT9FDlrE2d1ndg_0N2JxvCwk-9osg5JQHQ8adkEQRRRaLOTWWfFpnhxTUE8_z59CIedFozlHUDAFsg2wN87eCACcN55DTRSbIkvpaBeJmvsqeCspxYGAzMR054J', 'contractor', '0'),
(232, 168471, 'ftusXXVCXgU:APA91bHu05JwFdtsvffN8KtYyfxnS5t-xdh1Y0KFGiIfne9s48lHJNjuR6bgSa0-C1Up0mhNer8I1J8tgiSojcfF2tYnfVANw6S1yfBqO_V5CIWvNRPEjzxEbh8uJSrCpBuIGsPrkJrr', 'tender', '0'),
(233, 140, 'fQYC8Knss6E:APA91bF8B5kmwdb3_sEVPGmofz9XevzoqIOATXQlZDV4GGlKKJ2BkiRalLcfrZnexzwH1TNbe-pRIdKrlEobK7Blx532inkwxXipj7Z4_pnkoB_IJu4YbuJNPIgxpk2squYEY6_vpXES', 'supplier', '0'),
(234, 780554, ' ', 'tender', '0'),
(235, 151667, 'd8sMIKuXy3g:APA91bHTMSOrQxjXWa-WBw2ByytMrbKf6G8v_I4EFUxu7NGJb-MQuh5cC08bQuc3E3zacAbid75TEddHmZEa48r-5D9rDIBcJmkN1iSw7z5mC-2WBi8vYVkEzNAbQXk0nGy91xJGmk9M', 'tender', '0'),
(236, 740762, 'd8lXvaUkjHg:APA91bGO8cfN3h18kSwA3aBwApAt-7KycI58c9t7g0AfuUpa8lwS_IXjjfNeLN7kdgUNKbT5RCKGNqt22Ukco-uuWl2AR3PpPMuvhOOglfy6nSKl2XazoTILFJyf5DoNuwtCaxF_Auts', 'tender', '0'),
(238, 148, 'fP-d0Uw7VqM:APA91bHdgZH5lZvnvt4LqmrTKF_kfvv2jxXOx3DG8IEu4lU5UFP4LzlDDz-E37HbvfrGX0zdQR1wEW8GlXWSpHV6zaoDY6Kt0tMInlJLkeJs8PuIJ0AMw6ngVEHtWzdeRz2gWX0njZ4_', 'contractor', '0'),
(239, 150, 'f43IYlrkQ8M:APA91bFxjH7qmGg_D5EjkYXrsPcRFEPj255uAf-3U1fMcRAnpj7A61XOQefrRkqvNkb8PMdNldQ1t32B-ll-jXZUtr1wj0l_NmtdUZGJidDTl2nGDf0xYP6HQ0S-57GNGoBu9-g9qyGu', 'contractor', '0'),
(240, 151, 'cAwcwYWSxmU:APA91bEnS0SpgRTBrEkMjfUJMA3WOmncpoS_y6qi2RYkBVXfNqwmbArl0h9Cu0UGiYC8mQ4vxOTaHyVY-qeFDbCvTeSKjHqq7krcws1xMeokQiFPq3KbALxmnDIsmKfadm0dHTPd3OFv', 'contractor', '0'),
(241, 152, 'f43IYlrkQ8M:APA91bFxjH7qmGg_D5EjkYXrsPcRFEPj255uAf-3U1fMcRAnpj7A61XOQefrRkqvNkb8PMdNldQ1t32B-ll-jXZUtr1wj0l_NmtdUZGJidDTl2nGDf0xYP6HQ0S-57GNGoBu9-g9qyGu', 'contractor', '0'),
(242, 153, 'e30Mh595NcY:APA91bFLaDp5URSMkE5yXhlVbGsZhrfC5tqFvnv2MjtFtAyMsZmojC4HXIhsm5lzs2UMlpKzqlu1ky-hM4LeoZvWRQeHuFfMeakGp2D2-tjRLz2tFjAWWmR8w--EJq-JKoOxJ-8F78Hz', 'contractor', '0'),
(247, 157, 'chatksBs6n8:APA91bHyJGQqVkesPXVzN8I7DoVuC5YjZW9ZOPyMTUapRPWI0sU9xZzodyrjC55gZs8OfY3cibTl42LWdqraw-RuzFXE3aZOp2sSDGV5Fd0lpWIcyAAAYTQh8XBaSDi7AqGClL1gzrEj', 'supplier', '0'),
(243, 484288, 'dNRpL73j73U:APA91bElRna3kkwtVsUDeAD03DLPobnyhthptKf-EMzSsVVK9hZKDKTlxMkShcMce3B7fldjXV8mIT52XWXtxygYlZuH-9ItFAbPcgIsURzbbMX7GzIXqvJydtLrDQFC9eQh__usaaRT', 'tender', '0'),
(244, 138, 'd63RCTCZGUYwpLQC_RLDsf:APA91bGPDee8CdOYKWu_Mu_LwnkOEgoFgNxO0dHlYhl2eoknq7wt5Xd6p_F5dzcHPS_zmJX_9y2sRP_G-Hq3VMpo33qjylQeVRLN2IQgO9xx0Sgvd7I6Q1p2ssSFjGJQOh4eAsPi5Bcm', 'supplier', '0'),
(245, 154, 'e30Mh595NcY:APA91bFLaDp5URSMkE5yXhlVbGsZhrfC5tqFvnv2MjtFtAyMsZmojC4HXIhsm5lzs2UMlpKzqlu1ky-hM4LeoZvWRQeHuFfMeakGp2D2-tjRLz2tFjAWWmR8w--EJq-JKoOxJ-8F78Hz', 'supplier', '0'),
(246, 802213, 'eeYYWo6oNBw:APA91bFH8r2W3MAdtlcMba7zqmBjgN1BhNX-DLpUbDYZvyQ7Johvdqgix0ChZhf2WLWofIXdln7elaEAJk67zrXHI4SNgG7bh9tucKTEiJRfBxgv-Ge1VlQF7_1fvmrCBblqisDovC1q', 'tender', '0'),
(248, 208623, 'dKA8GhRAORY:APA91bFfrbDYu1ByE5vlNRtT49fzXBlrNKx4G7v62iQmQDg8-03nHTLepSjmYQij1QBn4elDXkzBWsGU-xgoUi0Px3qeoc1fnYH-sRWVMOTUf0Qse7RcPu029lCkOdxputNbNw9mGK_k', 'tender', '0'),
(249, 911818, 'dMMeGS4eMwo:APA91bGszViwX3STuL8Cj7iFTmLhILQ3Wslt90n01XDpxF9iwetz2HkvpHcXE1cEVSp06DzW-Es_qNc_68iP9KhYlR-xOgqJQGRg9JbfA8u_PwPgiJptmy5ZkRsSoj1D_sI41c8-bcIc', 'tender', '0'),
(250, 800536, 'dGZeM7A2v4U:APA91bFVYVbRtxojdL9sFwAl95ipxf7M5dmf7Xy4EM3BaIQyim-oFuS5-dkz-JconicvUAcFsjQpd801DzQEJB07eCaJ6QZYehURVQZ0uioyZqYvEInrknHHQK58zEpX3ljb_YRPTVqB', 'tender', '0'),
(251, 146, 'chs4NcYqwPM:APA91bFJcKO-7ZD7FGZb9iuLVJmZLOONeioB0HL3oIjLKW4NHOkhh9p7M421czTjJEDx1zzaoT8a7_xj5DIhq3aUBED0PZCXJ9AUEf-kh1xImwlo1X2ABPNpS7LfjCOOItiRhNR8FyV8', 'contractor', '0'),
(252, 950102, 'cnBrD8Y5E0s:APA91bErPBo3ks1ayLLJLvtarLU8A5RVULgkKttUacpcnkuuO4jQNoQwj46linH8nDKTcwG_7ugsWhmCkG_viPRYxZeDIlljdCJnPSh7nxX9S_BmMdIxlaIvEe2xrbiVApMq_vGVKJSb', 'tender', '0'),
(253, 162, 'fsdW4pz0heE:APA91bGHNi7z8nJao3c4Yic0TwHz11FK-ozUGejBCKjbbsggvlyTZiKjfWfrCJfW-N4KpDl7YPuN04kMeFtsofaFiNLHsLm5dgZDHmhLbomIcW9lf7p-LBh_wJsQLS4-gFN_NPZ1TYdD', 'contractor', '0'),
(254, 508424, 'dNRpL73j73U:APA91bElRna3kkwtVsUDeAD03DLPobnyhthptKf-EMzSsVVK9hZKDKTlxMkShcMce3B7fldjXV8mIT52XWXtxygYlZuH-9ItFAbPcgIsURzbbMX7GzIXqvJydtLrDQFC9eQh__usaaRT', 'tender', '0'),
(255, 163, 'ejd5qX9aucQ:APA91bHRrA1JDbcXFcGZpL9o1wmLee0-NAB8KPjd8pT0MsymAiqjOeBF0CKLU3X7ZxmfjA4Y3bLB2PctygDhkWzJe15cKkh0xG5Ec3aoW_KlE-0dbom8cIiaK9eGSDTw6LQ6PLMCVMe0', 'contractor', '0'),
(256, 164, 'fp2xLNK_M4A:APA91bHXL6jRfOCC8Y4SY4PYqCSc4sOsoDyBIBMO5iAlxZjoLR3V7d6SoinKFcE2U_4uCjAxpmUwUDA_EJXA7xv2JvBiJQ_Ei25pt5wk5IFnUnHRY1J3lICp8zJ5-G5AZLqPrmfYrsVg', 'supplier', '0'),
(257, 708365, 'dWa1rjIOUS8:APA91bEo5fkgOePjSR9SxfDgTU7fSUSxr645fQVFn4Ae-wO7EuWv0gPwVQ0yGlaFlrSqfOOZEF9s6l3MyzaFc6CFmJqwFkiB6O2K0qhGxMpiaP85JupXGbguDQf2bv_7vqi1UUrkPuPe', 'tender', '0');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `plan_type` enum('Professional','Single Bid') NOT NULL,
  `price` int(11) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sc_equip_contact`
--

CREATE TABLE `sc_equip_contact` (
  `id` int(11) NOT NULL,
  `sub_contractor_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `location_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `response` enum('','0','1') NOT NULL,
  `type` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sc_labour_contact`
--

CREATE TABLE `sc_labour_contact` (
  `id` int(11) NOT NULL,
  `sub_contractor_id` int(11) NOT NULL,
  `labour_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `response` enum('0','1','') NOT NULL DEFAULT '',
  `time` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sc_material_contact`
--

CREATE TABLE `sc_material_contact` (
  `id` int(11) NOT NULL,
  `sub_contractor_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `response` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill`) VALUES
(1, 'Carpentory'),
(2, 'Flooring'),
(3, 'Ceiling Expert'),
(4, 'Plumber'),
(5, 'Interior Designers'),
(6, 'Electrician');

-- --------------------------------------------------------

--
-- Table structure for table `sub_contractor_details`
--

CREATE TABLE `sub_contractor_details` (
  `sub_cont_details_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `statutory` varchar(255) NOT NULL,
  `security` varchar(255) NOT NULL,
  `cost_range` int(11) NOT NULL,
  `monetory_value` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `posts` varchar(20) NOT NULL DEFAULT 'Unlimited',
  `time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_contractor_details`
--

INSERT INTO `sub_contractor_details` (`sub_cont_details_id`, `market_user_id`, `image`, `company_name`, `statutory`, `security`, `cost_range`, `monetory_value`, `link`, `posts`, `time`) VALUES
(1, 3, '', 'rcb', '709333857.jpg', '577878886.jpg', 254698, 5866645, 'www.rcb.com', 'Unlimited', '2020-03-27'),
(2, 13, '', 'Vcon Floors', '13193876.jpg', '1886009011.jpg', 450, 550000, 'www.viridicon.co.za ', 'Unlimited', '2020-03-29'),
(4, 104, '', 'Paintoria', '1597639251.jpg', '214214206.jpg', 45, 45, 'www.paintoria.co.za', 'Unlimited', '2020-05-19'),
(5, 124, '1388975731.jpeg', 'SMART irrigation ', '1191517563.jpeg', '1119023658.jpeg', 1234, 1234, 'www.smart-irrigation.co.za', 'Unlimited', '2020-06-13'),
(6, 129, '', 'Rs construction', '1463750776.jpg', '746609171.jpg', 180, 736618473, 'lylestest.robert@gmail.com', 'Unlimited', '2020-06-23'),
(7, 129, '', 'Rs construction', '807048938.jpg', '1681820176.jpg', 180, 736618473, 'lylestest.robert@gmail.com', 'Unlimited', '2020-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `sub_contractor_details_image`
--

CREATE TABLE `sub_contractor_details_image` (
  `id` int(11) NOT NULL,
  `sub_cont_details_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_contractor_details_image`
--

INSERT INTO `sub_contractor_details_image` (`id`, `sub_cont_details_id`, `images`) VALUES
(1, 1, '90266.jpg'),
(2, 1, '24472.jpg'),
(3, 2, '17064.jpg'),
(4, 3, '29512.jpg'),
(5, 4, '45807.jpg'),
(6, 4, '31136.jpg'),
(7, 4, '28254.jpg'),
(8, 4, '83007.jpg'),
(9, 4, '31724.jpg'),
(10, 5, '81364.jpeg'),
(11, 5, '34847.jpeg'),
(12, 5, '45799.jpeg'),
(13, 6, '73809.jpg'),
(14, 6, '74103.jpg'),
(15, 6, '16879.jpg'),
(16, 6, '85043.jpg'),
(17, 6, '53832.jpg'),
(18, 7, '63813.jpg'),
(19, 7, '58040.jpg'),
(20, 7, '50073.jpg'),
(21, 7, '90576.jpg'),
(22, 7, '95317.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details`
--

CREATE TABLE `supplier_details` (
  `supplier_detail_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `time` varchar(255) NOT NULL,
  `posts` varchar(20) NOT NULL DEFAULT 'Unlimited'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`supplier_detail_id`, `market_user_id`, `company_name`, `image`, `link`, `time`, `posts`) VALUES
(1, 21, 'TASS Slabs', '', 'tassgroup.co.za', '2020-04-01', 'Unlimited'),
(2, 39, 'CCTV SPECIALISTS ', '', 'www.sasecuritysolutions.co.za ', '2020-05-12', 'Unlimited'),
(3, 47, 'C and   J  FENCING  AFRICA ', '', 'www.candjfencingafrica.com ', '2020-05-12', 'Unlimited'),
(4, 55, 'Zero Footprint Energy', '', 'www.zerofootprint.co.za', '2020-05-13', 'Unlimited'),
(5, 59, 'hairdresser', '', 'Mbusisenihairdresser', '2020-05-13', 'Unlimited'),
(6, 68, 'Narasimha Projects ', '1426069945.jpg', '', '2020-05-14', 'Unlimited'),
(7, 81, 'WDCG', '', '', '2020-05-15', 'Unlimited'),
(8, 89, 'Timber Solutions ', '621779533.jpeg', 'www.timber-solutions.co.za', '2020-05-16', 'Unlimited'),
(9, 91, 'kSJ Installations', '', '', '2020-05-17', 'Unlimited'),
(10, 100, '.', '', '', '2020-05-18', 'Unlimited'),
(11, 101, 'Cape Health & Safety', '747746545.jpeg', 'www.capesafety.co.za', '2020-05-18', 'Unlimited'),
(12, 103, 'VoidCon', '', '', '2020-05-19', 'Unlimited'),
(14, 123, 'spiraltech', '', 'www.spiraltech.com', '2020-06-12', 'Unlimited'),
(15, 136, 'DW', '1691907267.jpeg', 'www.dw.com', '2020-06-30', 'Unlimited'),
(16, 140, 'testing123', '', '', '2020-07-07', 'Unlimited'),
(17, 138, 'yes', '154161967.jpeg', 'Yes', '2020-07-24', 'Unlimited'),
(18, 154, 'DW', '', 'dw.com', '2020-07-24', 'Unlimited'),
(19, 157, 'kemal', '', 'kemal.com', '2020-07-28', 'Unlimited'),
(20, 164, 'bazar', '', 'google', '2020-08-17', 'Unlimited');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_equip_post`
--

CREATE TABLE `supplier_equip_post` (
  `supplier_equip_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `type` enum('rent','sell') NOT NULL,
  `location_id` int(11) NOT NULL,
  `perdayprice` varchar(255) DEFAULT NULL,
  `permonthprice` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `from_hour` varchar(20) DEFAULT NULL,
  `to_hour` varchar(20) DEFAULT NULL,
  `status` enum('Active','Inactive','') NOT NULL,
  `description` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_equip_post`
--

INSERT INTO `supplier_equip_post` (`supplier_equip_id`, `market_user_id`, `title`, `type`, `location_id`, `perdayprice`, `permonthprice`, `price`, `from_hour`, `to_hour`, `status`, `description`, `time`) VALUES
(1, 106, 'Sibusiso Radebe', 'sell', 1, NULL, NULL, 1200, NULL, NULL, 'Active', 'size 4 upwards', '2020-05-19 12:05:47'),
(2, 106, 'Sibusiso Radebe', 'sell', 1, NULL, NULL, 1200, NULL, NULL, 'Active', 'size 4 upwards', '2020-05-19 12:06:05'),
(3, 125, 'test', 'rent', 1, '2', '22', NULL, '00:00', '00:01', 'Active', 'Test', '2020-06-17 14:16:27'),
(5, 154, 'Cement', 'sell', 1, NULL, NULL, 1200, NULL, NULL, 'Active', 'Cement', '2020-07-24 09:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_equip_post_images`
--

CREATE TABLE `supplier_equip_post_images` (
  `id` int(11) NOT NULL,
  `supplier_equip_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_equip_post_images`
--

INSERT INTO `supplier_equip_post_images` (`id`, `supplier_equip_id`, `images`) VALUES
(1, 1, '46218.jpg'),
(2, 1, '44266.jpg'),
(3, 1, '88238.jpg'),
(4, 1, '29349.jpg'),
(5, 1, '59456.jpg'),
(6, 2, '41077.jpg'),
(7, 2, '37697.jpg'),
(8, 2, '78948.jpg'),
(9, 2, '50039.jpg'),
(10, 2, '18717.jpg'),
(11, 2, '77775.jpg'),
(12, 2, '18590.jpg'),
(13, 2, '37880.jpg'),
(14, 2, '25051.jpg'),
(15, 2, '58918.jpg'),
(16, 3, '55261.jpeg'),
(18, 5, '75077.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_material_post`
--

CREATE TABLE `supplier_material_post` (
  `supplier_mat_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `location_id` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_material_post`
--

INSERT INTO `supplier_material_post` (`supplier_mat_id`, `market_user_id`, `title`, `location_id`, `status`, `quantity`, `unit`, `price`, `description`) VALUES
(1, 1, 'Clement', 2, 'Active', 100, 'kg', 2500, 'Cement package'),
(18, 75, 'Mud and Clay', 16, 'Active', 200, 'kg', 2000, 'Mud is a liquid or semi-liquid mixture of water and any combination of different kinds of soil. It usually forms after rainfall or near water sources. Ancient mud deposits harden over geological time to form sedimentary rock such as shale or mudstone. '),
(5, 7, 'cement', 1, 'Active', 100, 'kg', 250, 'cement'),
(6, 1, 'Mud and Clay', 37, 'Inactive', 34, 'kg', 250, 'Construction is the process of constructing a building or infrastructure.[1] Construction differs from manufacturing in that manufacturing typically involves mass production of similar items without a designated purchaser, while construction typically tak'),
(11, 18, 'Test', 2, 'Active', 1, 'two', 500, 'Large-scale construction requires collaboration across multiple disciplines. A project manager normally manages the budget on the job, and a construction manager, design engineer, construction engineer or architect supervises it.'),
(10, 7, 'clay', 7, 'Active', 100, 'kg', 2000, 'This is a list of building materials. Many types of building materials are used in the construction industry to create buildings and structures.\n\nThese categories of materials and products are used by architects and construction project managers to specif'),
(12, 25, 'Test', 2, 'Active', 1, 'ghss', 20, 'Test'),
(13, 25, 'concrete', 2, 'Active', 1, 'two', 500, 'test'),
(14, 18, 'test mat', 3, 'Active', 1, 'two', 500, 'Test'),
(15, 35, 'test', 2, 'Active', 1, 'reyo', 50, 'trsr'),
(16, 36, 'test', 4, 'Active', 2, 'rty', 40, 'Test'),
(17, 48, 'mix ', 1, 'Active', 1, 'two', 50, 'Tester'),
(19, 81, 'Cement', 6, 'Active', 500, 'kg', 5000, 'Construction is the process of constructing a building or infrastructure.[1] Construction differs from manufacturing in that manufacturing typically involves mass production of similar items without a designated purchaser, while construction typically tak'),
(20, 84, 'Cement', 6, 'Active', 800, 'kg', 5000, 'Construction is the process of constructing a building or infrastructure.[1] Construction differs from manufacturing in that manufacturing typically involves mass production of similar items without a designated purchaser, while construction typically tak'),
(21, 50, 'trowel', 13, 'Inactive', 1, '1', 200, 'A trowel is a small hand tool used for digging, applying, smoothing, or moving small amounts of viscous or particulate material. Common varieties include the masonry trowel, garden trowel, and float trowel.'),
(22, 50, 'steel', 17, 'Active', 1, '2', 300, 'Construction is the process of constructing a building or infrastructure. Construction differs from manufacturing in that manufacturing typically involves mass production of similar items without a designated purchaser, while construction typically takes place on location for a known client.'),
(23, 81, 'Kyle Windvogel ', 2, 'Active', 100, 'm2', 385, 'Carpentry services '),
(24, 81, 'Kyle Windvogel ', 2, 'Active', 100, 'm2', 385, 'Carpentry services '),
(25, 103, 'VoidPro', 1, 'Active', 100000, 'sheets', 0, 'VoidPro permanent shutter slab system. \nGalvanized permanent  insitu profiles.'),
(26, 103, 'VoidPro', 1, 'Active', 100000, 'sheets', 0, 'VoidPro permanent shutter slab system. \nGalvanized permanent  insitu profiles.'),
(31, 103, 'Hey', 5, '', 54, '84', 884, 'BB’s'),
(30, 103, 'FGS', 2, '', 15, '84', 54, 'Vah');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_material_post_images`
--

CREATE TABLE `supplier_material_post_images` (
  `id` int(11) NOT NULL,
  `supplier_mat_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_material_post_images`
--

INSERT INTO `supplier_material_post_images` (`id`, `supplier_mat_id`, `images`) VALUES
(18, 5, '76124.jpg'),
(17, 4, '86407.jpg'),
(16, 1, '95959.jpg'),
(23, 6, '76127.pdf'),
(22, 6, '16182.jpg'),
(31, 11, '16522.jpg'),
(29, 10, '50496.pdf'),
(28, 10, '40552.jpg'),
(37, 12, '37810.jpg'),
(36, 12, '45066.jpg'),
(38, 12, '74746.jpg'),
(39, 12, '59303.jpg'),
(40, 12, '80985.jpg'),
(41, 12, '44361.jpg'),
(42, 13, '75095.jpg'),
(43, 14, '87908.jpg'),
(44, 15, '54487.jpg'),
(45, 16, '77628.jpg'),
(46, 17, '38907.jpg'),
(47, 18, '75188.jpg'),
(48, 19, '38098.jpg'),
(49, 19, '64531.jpg'),
(50, 19, '71644.jpg'),
(51, 19, '43372.jpg'),
(52, 19, '92605.jpg'),
(53, 19, '41099.pdf'),
(71, 20, '88274.pdf'),
(70, 20, '20924.jpg'),
(69, 20, '50874.jpg'),
(68, 20, '90067.jpg'),
(67, 20, '44676.jpg'),
(66, 20, '59320.jpg'),
(72, 21, '66955.jpg'),
(73, 22, '21963.jpg'),
(74, 23, '30874.jpg'),
(75, 24, '33357.jpg'),
(76, 24, '45222.jpg'),
(77, 25, '22300.jpg'),
(78, 25, '78343.jpg'),
(79, 25, '52151.jpg'),
(80, 25, '14910.jpg'),
(81, 25, '73728.jpg'),
(82, 25, '37982.jpg'),
(83, 26, '53849.jpg'),
(84, 26, '58960.jpg'),
(85, 26, '58650.jpg'),
(86, 26, '33124.jpg'),
(87, 26, '26683.jpg'),
(88, 26, '33721.jpg'),
(89, 26, '27084.jpg'),
(90, 26, '72119.jpg'),
(91, 26, '82447.jpg'),
(92, 26, '61778.jpg'),
(93, 26, '79794.jpg'),
(94, 26, '25247.jpg'),
(95, 27, '48252.jpeg'),
(96, 28, '12171.jpeg'),
(97, 29, '63154.jpeg'),
(98, 30, '91789.jpeg'),
(99, 31, '57941.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE `tender` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `time` varchar(255) NOT NULL,
  `status` enum('1','0','','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`user_id`, `unique_id`, `image`, `name`, `email`, `phone`, `password`, `time`, `status`) VALUES
(1, 893390, NULL, 'Dirk Kotze', 'dirk@viridicon.co.za', '0848440007', 'bn70zsgp', '2020-03-30', '1'),
(2, 456249, '1428963247.jpg', 'Raymond Page', 'info@alunitepta.co.za', '0722261460', '123456', '2020-03-30', '1'),
(32, 841906, NULL, 'Serame Masigo ', 'srmasigo@gmail.com', '0720569562', '@Masigo94', '2020-05-17', '1'),
(31, 355324, NULL, 'Buildteki', 'buildteki@yahoo.com', '0710659659', 'buildteki2006', '2020-05-16', '1'),
(5, 685714, NULL, 'bhawna ', 'bhawnagoyal1303@gmail.com', '+918923587509', '123456', '2020-04-13', '1'),
(6, 531216, NULL, 'Charl', 'charl.fourie7@gmail.com', '0832966764', 'FourieCharl7', '2020-04-13', '1'),
(7, 951426, NULL, 'sahil', 'sahilvarshney6@gmail.com', '878543769497', '123456', '2020-04-15', '1'),
(8, 155537, NULL, 'Rohan Kumar Singh', 'rohan.designoweb@gmail.com', NULL, NULL, '', '1'),
(9, 418588, NULL, 'Theresa Bryant', 'theresabryant4512@gmail.com', '', 'Busdriver', '2020-04-16', '1'),
(10, 328670, NULL, 'ananth', 'ananth@adventus.ae', '00971502091968', 'rohini1974', '2020-04-16', '1'),
(11, 257301, NULL, 'Employer', 'byronfergusson@gmail.com', '0829305253', 'letmein', '2020-04-20', '1'),
(12, 510168, NULL, '????? ???????', 'mctolengit.03@gmail.com', NULL, NULL, '', '1'),
(13, 337259, NULL, 'Emy Preda', 'emyypreda@gmail.com', NULL, NULL, '', '1'),
(14, 799555, NULL, 'Duvan Robayo Roa', 'duvanchuroa@gmail.com', NULL, NULL, '', '1'),
(15, 214521, NULL, 'Lawrence Greene ', 'lovell102@gmail.com', '0724977657', 'greene101', '2020-05-12', '1'),
(16, 185398, NULL, 'bhawna goyal', 'bhawna.bg33@gmail.com', NULL, NULL, '', '1'),
(17, 957207, '933027940.jpg', 'test', 'testing@gmail.com', '+918923587509', '123456', '2020-05-12', '1'),
(18, 498878, NULL, 'Mobeen Docrat', 'mobeendocrat@gmail.com', NULL, NULL, '', '1'),
(19, 166901, NULL, 'Michael ', 'michael@aquamat.co.za', '0722255087', 'Aquamat20', '2020-05-13', '1'),
(20, 496939, NULL, 'Mukul sharma', 'bsacetmukul1995@gmail.com', NULL, NULL, '', '1'),
(21, 630428, NULL, 'Sahil Varshney', 'sahilvarshney66@gmail.com', NULL, NULL, '', '1'),
(22, 768547, NULL, 'Etienne Smit ', 'Etiennesmit.es@gmail.com', '', 'baTkj-F.Tqsi', '2020-05-13', '1'),
(23, 121610, NULL, 'Ashleigh', 'ashleigh7941@hotmail.com', '0835607830', 'Iluvsquash2', '2020-05-13', '1'),
(24, 718358, NULL, 'Louis Kruger ', 'krudos.construction@outlook.com', '0827118718', 'Krudos@2020', '2020-05-14', '1'),
(25, 673058, NULL, 'Seth', 'ccwcp01@gmail.com', '0726955200', 'traytray15', '2020-05-14', '1'),
(26, 189367, NULL, 'Gavin Engelbrecht ', 'gavin@eipconstruction.co.za', '0834586886', 'GavinEng6', '2020-05-15', '1'),
(27, 341838, NULL, 'Fortune', 'opulencenh@gmail.com', '0743338647', 'Tenderapp@47', '2020-05-15', '1'),
(28, 561958, NULL, 'Pieter Craucamp ', 'info@waterproofmyropf.co.za', '0743486420', 'AlfaBravo85', '2020-05-15', '1'),
(29, 584097, NULL, 'Pieter Craucamp ', 'info@waterproofmyroof.co.za', '0743486420', 'AlfaBravo85', '2020-05-15', '1'),
(30, 971574, NULL, 'Christopher Curt Ward', 'chrisw13@mobileemail.vodafonesa.co.za', NULL, NULL, '', '1'),
(33, 834841, NULL, 'William Diering', 'williamd@treasuryone.co.za', '', 'Monday@01', '2020-05-17', '1'),
(34, 189871, NULL, 'Jeff ', 'jeff@yahoo.com', '0823692580', '123456', '2020-05-18', '1'),
(35, 334990, NULL, 'Frank ', 'sales@paintoria.co.za', '0834501168', 'Paintoria@2020', '2020-05-19', '1'),
(36, 225977, NULL, 'Graham ', 'graham@adcopconsulting.com', '+27794963736', 'AdCop20$', '2020-05-19', '1'),
(37, 577202, NULL, 'Waleed Bekker', '0834664299@mtnloaded.co.za', '0834664299', 'waleed01', '2020-05-19', '1'),
(38, 373590, NULL, 'Frans Fourie', 'fransfourie60@gmail.com', '0828557588', '2o2oW@gw00rd', '2020-05-19', '1'),
(39, 436241, NULL, 'Ian Kemsley', 'ian@kemsley.za.net', '0832837394', 'owen14785', '2020-05-19', '1'),
(40, 117204, NULL, 'David1', 'davidjbrauer@gmail.com', '0823183245', 'thisislocked', '2020-05-22', '1'),
(41, 704672, NULL, 'Scott Whiteley', 'scott@blott.io', '0849992121', '1925Monica15@', '2020-05-22', '1'),
(42, 674398, NULL, 'CBEEGNMQ53ZEOC4R722K4BEZ7A-00@cloudtestlabaccounts.com', 'CBEEGNMQ53ZEOC4R722K4BEZ7A-00@cloudtestlabaccounts.com', NULL, NULL, '', '1'),
(43, 690244, NULL, 'Aydin Arslan', 'santiyenet@gmail.com', NULL, NULL, '', '1'),
(44, 639013, NULL, '???? ???', 'amir2069@gmail.com', NULL, NULL, '', '1'),
(45, 992553, NULL, 'Bastiat', 'bastiat.viljoen@gmail.com', '', 'buildapp', '2020-06-13', '1'),
(46, 182096, NULL, 'SHUBHAM GUPTA', 'shubhjee143@gmail.com', NULL, NULL, '', '1'),
(47, 694524, '197528267.jpg', 'Test1', 'davidjbrauer+1@gmail.com', '', 'locked1', '2020-06-17', '1'),
(48, 833732, NULL, 'Armand London', 'armfixlondon@aol.com', '07884559699', '@Arm13', '2020-06-22', '1'),
(49, 196125, NULL, 'Ruchika Singh', 'ruchika@designoweb.com', NULL, NULL, '', '1'),
(50, 150698, NULL, 'Dirk Kotze', 'dirk_kotze1@hotmail.com', '0848440007', NULL, '', '1'),
(51, 783240, NULL, 'Mark', 'markwrundle@icloud.com', '0828067743', 'Rundle1985@', '2020-06-29', '1'),
(52, 821747, '676897119.jpg', 'Vibhuti', 'vibhuti@gmail.com', '8650987412', '123456', '2020-06-30', '1'),
(53, 377038, '737419702.jpg', 'Anukriti Sah', 'anu@gmail.com', '9658741252', '123456', '2020-06-30', '1'),
(54, 729413, NULL, 'David Brown', 'davidjbrauer+brown@gmail.com', '0823183245', '928978', '2020-06-30', '1'),
(55, 939480, NULL, 'Jayden Carterson', 'jaycarterson@gmail.com', '', 'apache222', '2020-06-30', '1'),
(56, 484051, NULL, 'EllaX', 'geogatedproject121@gmail.com', NULL, NULL, '', '1'),
(57, 950297, NULL, 'Benjamin Brauer', 'bzbrauer@gmail.com', NULL, NULL, '', '1'),
(58, 425408, NULL, 'Saurabh Chandra Bose', 'saurabh.designoweb@gmail.com', NULL, NULL, '', '1'),
(59, 168471, NULL, 'aaa', 'kongxiangjia106@hotmail.com', '1231234234', 'aaaaaa', '2020-07-07', '1'),
(60, 780554, NULL, 'Raj', 'raj@gmail.com', '', 'qqqqqq', '2020-07-08', '1'),
(61, 515881, NULL, 'Marty Hoffman', 'martyhoffman.26507@gmail.com', NULL, NULL, '', '1'),
(62, 151667, NULL, 'Saurabh ChandraBose', 'mmk46zx75w@privaterelay.appleid.com', NULL, NULL, '', '1'),
(63, 740762, NULL, 'Itumeleng Molise', 'itumeleng449@gmail.com', '0842662380', '920312', '2020-07-16', '1'),
(64, 484288, NULL, 'David1', 'davidjbrauer+12@gmail.com', '', 'locked', '2020-07-23', '1'),
(65, 802213, NULL, 'Mellisa Hattingh', 'mellisa.hattingh@gmail.com', '0832619515', '962125', '2020-07-27', '1'),
(66, 208623, NULL, 'Londani', 'lonzat@gmail.com', '0658951660', 'Londai600$', '2020-07-29', '1'),
(67, 911818, NULL, 'Sedima Rieneth Ratlabjana', 'rienethsedima@gmail.com', '0749408880', 'Rieneth8719', '2020-07-31', '1'),
(68, 800536, NULL, 'Nkhupetsene', 'lephophi@gmail.com', '0765755771', 'viridicon', '2020-08-01', '1'),
(69, 219121, NULL, 'CBEEGNMQ53ZEOC4R722K4BEZ7A-08@cloudtestlabaccounts.com', 'CBEEGNMQ53ZEOC4R722K4BEZ7A-08@cloudtestlabaccounts.com', NULL, NULL, '', '1'),
(70, 950102, NULL, 'Sahil Kumar', 'sahil.kumardesignoweb@gmail.com', NULL, NULL, '', '1'),
(71, 508424, NULL, 'Testing', 'davidjbrauer+testing@gmail.com', '0823183245', 'thisislocked', '2020-08-15', '1'),
(72, 708365, NULL, 'lathif photography', 'lathifphotography95@gmail.com', NULL, NULL, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tender_notification`
--

CREATE TABLE `tender_notification` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `notification` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tender_review`
--

CREATE TABLE `tender_review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_contractor_contact`
--

CREATE TABLE `user_contractor_contact` (
  `ucc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `plot_area` varchar(255) NOT NULL,
  `built_up` varchar(255) NOT NULL,
  `cost_to` int(11) NOT NULL,
  `cost_from` int(11) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `quality` enum('low','medium','high','') NOT NULL,
  `location_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `response` enum('0','1','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_contractor_contact`
--

INSERT INTO `user_contractor_contact` (`ucc_id`, `user_id`, `market_user_id`, `title`, `plot_area`, `built_up`, `cost_to`, `cost_from`, `start_date`, `end_date`, `quality`, `location_id`, `description`, `time`, `response`) VALUES
(1, 52, 19, 'waterproofing to scullery ', '50', '50', 2500, 2000, '2020-4-20', '2020-4-21', 'high', 5, 'please assist with a quote to waterproof my scullery ', '2020-04-01', ''),
(2, 52, 12, 'New Braai Area', '65', '65', 20000, 15000, '2020-4-28', '2020-5-29', 'medium', 3, 'Would like to build a new braai ', '2020-04-15', ''),
(3, 52, 12, 'garden repairs', '55', '55', 150000, 125000, '2020-4-22', '2020-4-30', 'high', 1, 'remodeling of my garden \n', '2020-04-20', ''),
(4, 11, 12, 'Upgrade bathrooms ', '36', '36', 65000, 55000, '2020-4-30', '2020-5-30', 'high', 7, 'Retile, new shower and basins ', '2020-04-20', '1'),
(5, 1, 41, 'ac repair', '2', '1', 150, 100, '2020-6-08', '2020-6-09', 'high', 5, 'I have 2 aircon units that needs a service', '2020-05-12', ''),
(6, 11, 43, 'hello', '250', '250', 30000, 25000, '2020-6-08', '2020-6-12', 'high', 5, 'we want to test ', '2020-06-05', '0'),
(7, 45, 12, 'Hh', '100', '100', 120, 120, '2020-06-15', '2020-06-23', 'medium', 5, 'Dish', '2020-06-13', '1'),
(8, 45, 12, 'Hh', '100', '100', 120, 120, '2020-06-15', '2020-06-23', 'medium', 5, 'Dish', '2020-06-13', '1'),
(9, 47, 125, 'T', '2', '2', 223, 2, '2020-07-17', '2020-09-17', 'low', 1, 'GH', '2020-06-17', ''),
(10, 47, 125, 'T', '2', '2', 223, 2, '2020-07-17', '2020-09-17', 'low', 1, 'GH', '2020-06-17', ''),
(11, 47, 12, 'Test', '1', '11', 2, 1, '2020-07-19', '2020-10-19', 'low', 1, 'Test', '2020-06-19', ''),
(12, 47, 12, 'Test', '1', '11', 2, 1, '2020-07-19', '2020-10-19', 'low', 1, 'Test', '2020-06-19', '1'),
(13, 47, 12, 'Test', '1', '11', 2, 1, '2020-07-19', '2020-10-19', 'low', 1, 'Test', '2020-06-19', ''),
(14, 1, 110, 'dirk', '100', '1222', 4000, 1000, '2020-6-24', '2020-7-18', 'high', 2, 'Test please respond', '2020-06-19', ''),
(15, 1, 43, 'test', '1000', '1000', 1111, 1, '2020-6-30', '2020-9-12', 'high', 5, 'Test', '2020-06-19', '1'),
(16, 17, 130, 'test ', '280', '16', 20000, 5000, '2020-6-27', '2020-7-18', 'low', 5, 'Test ', '2020-06-24', '1'),
(17, 50, 125, 'ghghh', '1000', '1000', 11112, 11111, '2020-6-30', '2020-7-25', 'high', 5, 'yyyyyy', '2020-06-26', ''),
(18, 11, 137, 'New bathroom Reno', '450', '50', 55000, 25000, '2020-7-27', '2020-8-31', 'high', 5, 'demolition and redoing of existing bathroom ', '2020-07-02', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_contractor_contact_images`
--

CREATE TABLE `user_contractor_contact_images` (
  `id` int(11) NOT NULL,
  `ucc_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_contractor_contact_images`
--

INSERT INTO `user_contractor_contact_images` (`id`, `ucc_id`, `images`) VALUES
(1, 1, '33933.jpeg'),
(2, 2, '28330.jpg'),
(3, 3, '42238.jpg'),
(4, 4, '65193.jpg'),
(5, 5, '33802.jpg'),
(6, 6, '70879.jpg'),
(7, 7, '11834.jpeg'),
(8, 8, '53589.jpeg'),
(9, 9, '47389.jpeg'),
(10, 10, '73436.jpeg'),
(11, 11, '21532.jpeg'),
(12, 12, '50301.jpeg'),
(13, 13, '19161.jpeg'),
(14, 14, '97885.jpg'),
(15, 14, '45086.jpg'),
(16, 14, '71159.jpg'),
(17, 14, '30452.jpg'),
(18, 14, '83276.jpg'),
(19, 15, '88112.jpg'),
(20, 16, '18987.jpg'),
(21, 17, '88297.jpg'),
(22, 18, '40372.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_equipment_contact`
--

CREATE TABLE `user_equipment_contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `response` enum('0','1','','') NOT NULL DEFAULT '0',
  `type` enum('rent','buy') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_equipment_contact`
--

INSERT INTO `user_equipment_contact` (`id`, `user_id`, `market_user_id`, `title`, `start_date`, `end_date`, `description`, `location_id`, `time`, `response`, `type`) VALUES
(1, 1, 125, 'tlb', '2020-6-25', '2020-6-30', 'Test please reply', 63, '', '', 'rent'),
(2, 46, 154, 'Cement', NULL, NULL, 'Cement', 1, '', '1', 'buy');

-- --------------------------------------------------------

--
-- Table structure for table `user_labour_contact`
--

CREATE TABLE `user_labour_contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location_id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `response` enum('0','1','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_labour_contact`
--

INSERT INTO `user_labour_contact` (`id`, `user_id`, `market_user_id`, `title`, `start_date`, `end_date`, `description`, `location_id`, `time`, `response`) VALUES
(1, 1, 113, 'ssem', '2020-6-21', '2020-6-30', 'Helle this is a test. Send me a what\'s up if you get this.\n\nDirk', 5, '2020-06-19', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_marketplace_review`
--

CREATE TABLE `user_marketplace_review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_material_contact`
--

CREATE TABLE `user_material_contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `market_user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `response` enum('0','1','') NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_material_contact`
--

INSERT INTO `user_material_contact` (`id`, `user_id`, `market_user_id`, `title`, `quantity`, `description`, `location_id`, `response`, `time`) VALUES
(1, 1, 103, '225 middelberg ', 355, 'Please send m2 rate for supply and fit.\n\nTest message from deve team. Please respond with message ', 1, '', ''),
(2, 8, 103, 'dummy', 1, 'desc', 5, '', ''),
(3, 54, 16, 'test', 2, 'Test', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE `user_post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `plot_area` varchar(255) NOT NULL,
  `built_up` varchar(255) NOT NULL,
  `cost_to` int(11) NOT NULL,
  `cost_from` int(11) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `quality` enum('low','medium','high','') NOT NULL,
  `description` text NOT NULL,
  `location_id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `response` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`post_id`, `user_id`, `title`, `plot_area`, `built_up`, `cost_to`, `cost_from`, `start_date`, `end_date`, `quality`, `description`, `location_id`, `time`, `status`, `response`) VALUES
(23, 54, 'My Project ', '22', '22', 2, 1, '2020-08-30', '2020-09-30', 'medium', 'This is my first project and I’m really excited. Please note this is a test by the admin and you should not reply to this project. Thank you. If you have any issues, please contact support :) ', 1, '2020-06-30', '', '0'),
(22, 53, 'House construction', '8', '10', 50, 25, '2020-7-11', '2020-8-31', 'high', 'House construction', 2, '2020-06-30', 'Active', '0'),
(21, 52, 'Room construction', '1500', '5000', 100, 50, '2020-7-02', '2020-7-04', 'high', 'Want to construct an extra room. ', 1, '2020-06-30', 'Active', '0'),
(7, 8, 'test', '250', '16', 50000, 25000, '2020-4-20', '2020-5-18', 'medium', 'I would like to do an extension to my kitchen to form a scullery ', 1, '2020-04-15', 'Active', '0'),
(9, 11, 'Braai build ', '555', '20', 68000, 55000, '2020-4-29', '2020-5-29', 'medium', 'New wood fire braai', 5, '2020-04-20', 'Active', '0'),
(10, 11, 'Glass repairs ', '550', '10', 5000, 2000, '2020-5-04', '2020-5-05', 'high', '\nNeed glass repairs to our kitchen window \n', 5, '2020-04-20', 'Active', '0'),
(11, 40, 'Test Repair ', '10', '10', 50, 20, '2020-07-22', '2020-09-22', 'high', 'Test ', 1, '2020-05-22', 'Inactive', '0'),
(20, 1, 'house revamp', '700', '420', 750000, 500000, '2020-8-03', '2020-12-11', 'high', 'Add a hole level on to my house', 5, '2020-06-29', 'Active', '0'),
(15, 47, 'Test', '8', '8', 109, 22, '2020-08-17', '2020-11-17', 'high', 'Test', 1, '2020-06-17', 'Active', '0'),
(16, 47, 'Testing Tender ', '2', '22', 2, 1, '2020-07-29', '2020-10-29', 'medium', 'Test', 1, '2020-06-29', 'Active', '0'),
(24, 54, 'My Project ', '22', '22', 2, 1, '2020-08-30', '2020-09-30', 'medium', 'This is my first project and I’m really excited. Please note this is a test by the admin and you should not reply to this project. Thank you. If you have any issues, please contact support :) ', 1, '2020-06-30', '', '0'),
(25, 54, 'My Project ', '22', '22', 2, 1, '2020-08-30', '2020-09-30', 'medium', 'This is my first project and I’m really excited. Please note this is a test by the admin and you should not reply to this project. Thank you. If you have any issues, please contact support :) ', 1, '2020-06-30', '', '0'),
(29, 60, 'New Requirement ', '1000', '1200', 1400, 1200, '2020-08-08', '2020-11-08', 'medium', 'Hello ', 3, '2020-07-08', 'Active', '0'),
(28, 60, 'New Requirement ', '1000', '1200', 1400, 1200, '2020-07-09', '2020-09-08', 'medium', 'Hello ', 1, '2020-07-08', '', '0'),
(30, 17, 'test ', '500', '250', 600, 500, '2020-7-31', '2020-8-07', 'medium', 'Test', 4, '2020-08-21', 'Active', '0'),
(31, 7, 'Rahul', '543', '12', 12, 12, '2020-09-23', '2020-11-23', 'medium', 'Gd', 2, '2020-07-23', 'Active', '0'),
(32, 65, 'Flooring', '200', '25', 10000, 1000, '2020-8-24', '2020-8-25', 'high', 'Test description', 2, '2020-08-15', 'Active', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_post_aoi`
--

CREATE TABLE `user_post_aoi` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `aoi_desc_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post_aoi`
--

INSERT INTO `user_post_aoi` (`id`, `post_id`, `aoi_desc_id`) VALUES
(32, 1, 45),
(31, 1, 55),
(30, 1, 54),
(29, 1, 50),
(28, 1, 48),
(27, 1, 42),
(26, 1, 41),
(25, 1, 26),
(24, 1, 25),
(23, 1, 21),
(22, 1, 22),
(21, 1, 23),
(20, 1, 16),
(19, 1, 17),
(18, 1, 15),
(17, 1, 13),
(33, 2, 16),
(34, 2, 13),
(35, 2, 17),
(36, 2, 68),
(37, 2, 69),
(38, 3, 2),
(39, 4, 1),
(40, 5, 1),
(41, 6, 1),
(42, 7, 1),
(43, 8, 12),
(44, 9, 13),
(45, 9, 14),
(46, 9, 15),
(47, 10, 32),
(48, 11, 0),
(49, 11, 19),
(50, 12, 13),
(51, 13, 13),
(52, 14, 0),
(53, 14, 18),
(54, 15, 0),
(55, 15, 1),
(56, 15, 7),
(57, 16, 0),
(58, 16, 1),
(59, 17, 5),
(60, 17, 6),
(61, 18, 17),
(62, 19, 21),
(63, 20, 13),
(64, 20, 15),
(65, 20, 16),
(66, 20, 17),
(67, 21, 1),
(68, 21, 2),
(69, 21, 3),
(70, 22, 1),
(71, 22, 2),
(72, 22, 3),
(73, 23, 0),
(74, 23, 4),
(75, 24, 0),
(76, 24, 4),
(77, 25, 0),
(78, 25, 4),
(79, 26, 0),
(80, 26, 21),
(81, 26, 2),
(82, 26, 3),
(83, 27, 0),
(84, 27, 21),
(85, 27, 2),
(86, 27, 3),
(87, 28, 0),
(88, 28, 6),
(89, 29, 0),
(90, 29, 8),
(97, 30, 4),
(96, 30, 5),
(93, 31, 0),
(94, 31, 2),
(95, 32, 38);

-- --------------------------------------------------------

--
-- Table structure for table `user_post_images`
--

CREATE TABLE `user_post_images` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post_images`
--

INSERT INTO `user_post_images` (`id`, `post_id`, `images`) VALUES
(1, 1, '16077.pdf'),
(2, 2, '73063.jpg'),
(3, 3, '89849.jpg'),
(8, 6, '59412.pdf'),
(7, 6, '70825.png'),
(9, 7, '35462.png'),
(10, 7, '95707.pdf'),
(11, 8, '11983.pdf'),
(12, 9, '86266.jpg'),
(13, 10, '24069.jpg'),
(14, 11, '55051.jpeg'),
(17, 16, '84074.jpeg'),
(18, 17, '71377.jpg'),
(19, 18, '83237.jpg'),
(20, 19, '77427.jpg'),
(21, 23, '64586.jpeg'),
(22, 23, '80534.jpeg'),
(23, 23, '73069.jpeg'),
(24, 24, '39351.jpeg'),
(25, 24, '11832.jpeg'),
(26, 24, '60617.jpeg'),
(27, 25, '89368.jpeg'),
(28, 25, '96570.jpeg'),
(29, 25, '27159.jpeg'),
(30, 26, '43576.jpeg'),
(31, 27, '82563.jpeg'),
(32, 28, '94853.jpeg'),
(33, 29, '60763.jpeg'),
(36, 30, '66626.png'),
(35, 31, '96180.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_profileimage`
--

CREATE TABLE `user_profileimage` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aoi`
--
ALTER TABLE `aoi`
  ADD PRIMARY KEY (`aoi_id`);

--
-- Indexes for table `aoi_description`
--
ALTER TABLE `aoi_description`
  ADD PRIMARY KEY (`aoi_desc_id`);

--
-- Indexes for table `app_setting`
--
ALTER TABLE `app_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractor_bid`
--
ALTER TABLE `contractor_bid`
  ADD PRIMARY KEY (`bid_id`);

--
-- Indexes for table `contractor_bid_images`
--
ALTER TABLE `contractor_bid_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractor_details`
--
ALTER TABLE `contractor_details`
  ADD PRIMARY KEY (`contractor_detail_id`);

--
-- Indexes for table `contractor_equipment_contact`
--
ALTER TABLE `contractor_equipment_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractor_labour_contact`
--
ALTER TABLE `contractor_labour_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractor_material_contact`
--
ALTER TABLE `contractor_material_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractor_post`
--
ALTER TABLE `contractor_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractor_sc_contact`
--
ALTER TABLE `contractor_sc_contact`
  ADD PRIMARY KEY (`contractor_sc_contact_id`);

--
-- Indexes for table `contractor_sc_contact_images`
--
ALTER TABLE `contractor_sc_contact_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `faq_desc`
--
ALTER TABLE `faq_desc`
  ADD PRIMARY KEY (`faq_desc_id`);

--
-- Indexes for table `labour_details`
--
ALTER TABLE `labour_details`
  ADD PRIMARY KEY (`labour_detail_id`);

--
-- Indexes for table `labour_details_image`
--
ALTER TABLE `labour_details_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labour_post`
--
ALTER TABLE `labour_post`
  ADD PRIMARY KEY (`labour_post_id`);

--
-- Indexes for table `labour_post_images`
--
ALTER TABLE `labour_post_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `marketplace`
--
ALTER TABLE `marketplace`
  ADD PRIMARY KEY (`market_user_id`);

--
-- Indexes for table `marketplace_aoi`
--
ALTER TABLE `marketplace_aoi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketplace_location`
--
ALTER TABLE `marketplace_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketplace_notification`
--
ALTER TABLE `marketplace_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketplace_project`
--
ALTER TABLE `marketplace_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `marketplace_project_images`
--
ALTER TABLE `marketplace_project_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketplace_qualification`
--
ALTER TABLE `marketplace_qualification`
  ADD PRIMARY KEY (`qualification_id`);

--
-- Indexes for table `marketplace_review`
--
ALTER TABLE `marketplace_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketplace_skills`
--
ALTER TABLE `marketplace_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketplace_subscription`
--
ALTER TABLE `marketplace_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sc_equip_contact`
--
ALTER TABLE `sc_equip_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sc_labour_contact`
--
ALTER TABLE `sc_labour_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sc_material_contact`
--
ALTER TABLE `sc_material_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `sub_contractor_details`
--
ALTER TABLE `sub_contractor_details`
  ADD PRIMARY KEY (`sub_cont_details_id`);

--
-- Indexes for table `sub_contractor_details_image`
--
ALTER TABLE `sub_contractor_details_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD PRIMARY KEY (`supplier_detail_id`);

--
-- Indexes for table `supplier_equip_post`
--
ALTER TABLE `supplier_equip_post`
  ADD PRIMARY KEY (`supplier_equip_id`);

--
-- Indexes for table `supplier_equip_post_images`
--
ALTER TABLE `supplier_equip_post_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_material_post`
--
ALTER TABLE `supplier_material_post`
  ADD PRIMARY KEY (`supplier_mat_id`);

--
-- Indexes for table `supplier_material_post_images`
--
ALTER TABLE `supplier_material_post_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tender_notification`
--
ALTER TABLE `tender_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tender_review`
--
ALTER TABLE `tender_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user_contractor_contact`
--
ALTER TABLE `user_contractor_contact`
  ADD PRIMARY KEY (`ucc_id`);

--
-- Indexes for table `user_contractor_contact_images`
--
ALTER TABLE `user_contractor_contact_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_equipment_contact`
--
ALTER TABLE `user_equipment_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_labour_contact`
--
ALTER TABLE `user_labour_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_marketplace_review`
--
ALTER TABLE `user_marketplace_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user_material_contact`
--
ALTER TABLE `user_material_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user_post_aoi`
--
ALTER TABLE `user_post_aoi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_post_images`
--
ALTER TABLE `user_post_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profileimage`
--
ALTER TABLE `user_profileimage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aoi`
--
ALTER TABLE `aoi`
  MODIFY `aoi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `aoi_description`
--
ALTER TABLE `aoi_description`
  MODIFY `aoi_desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `app_setting`
--
ALTER TABLE `app_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contractor_bid`
--
ALTER TABLE `contractor_bid`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contractor_bid_images`
--
ALTER TABLE `contractor_bid_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contractor_details`
--
ALTER TABLE `contractor_details`
  MODIFY `contractor_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `contractor_equipment_contact`
--
ALTER TABLE `contractor_equipment_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contractor_labour_contact`
--
ALTER TABLE `contractor_labour_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contractor_material_contact`
--
ALTER TABLE `contractor_material_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contractor_post`
--
ALTER TABLE `contractor_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contractor_sc_contact`
--
ALTER TABLE `contractor_sc_contact`
  MODIFY `contractor_sc_contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contractor_sc_contact_images`
--
ALTER TABLE `contractor_sc_contact_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `faq_desc`
--
ALTER TABLE `faq_desc`
  MODIFY `faq_desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `labour_details`
--
ALTER TABLE `labour_details`
  MODIFY `labour_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `labour_details_image`
--
ALTER TABLE `labour_details_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `labour_post`
--
ALTER TABLE `labour_post`
  MODIFY `labour_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `labour_post_images`
--
ALTER TABLE `labour_post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `marketplace`
--
ALTER TABLE `marketplace`
  MODIFY `market_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `marketplace_aoi`
--
ALTER TABLE `marketplace_aoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT for table `marketplace_location`
--
ALTER TABLE `marketplace_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `marketplace_notification`
--
ALTER TABLE `marketplace_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketplace_project`
--
ALTER TABLE `marketplace_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marketplace_project_images`
--
ALTER TABLE `marketplace_project_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `marketplace_qualification`
--
ALTER TABLE `marketplace_qualification`
  MODIFY `qualification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `marketplace_review`
--
ALTER TABLE `marketplace_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `marketplace_skills`
--
ALTER TABLE `marketplace_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `marketplace_subscription`
--
ALTER TABLE `marketplace_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sc_equip_contact`
--
ALTER TABLE `sc_equip_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sc_labour_contact`
--
ALTER TABLE `sc_labour_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sc_material_contact`
--
ALTER TABLE `sc_material_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_contractor_details`
--
ALTER TABLE `sub_contractor_details`
  MODIFY `sub_cont_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_contractor_details_image`
--
ALTER TABLE `sub_contractor_details_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `supplier_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supplier_equip_post`
--
ALTER TABLE `supplier_equip_post`
  MODIFY `supplier_equip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier_equip_post_images`
--
ALTER TABLE `supplier_equip_post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supplier_material_post`
--
ALTER TABLE `supplier_material_post`
  MODIFY `supplier_mat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `supplier_material_post_images`
--
ALTER TABLE `supplier_material_post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tender`
--
ALTER TABLE `tender`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tender_notification`
--
ALTER TABLE `tender_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tender_review`
--
ALTER TABLE `tender_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_contractor_contact`
--
ALTER TABLE `user_contractor_contact`
  MODIFY `ucc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_contractor_contact_images`
--
ALTER TABLE `user_contractor_contact_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_equipment_contact`
--
ALTER TABLE `user_equipment_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_labour_contact`
--
ALTER TABLE `user_labour_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_marketplace_review`
--
ALTER TABLE `user_marketplace_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_material_contact`
--
ALTER TABLE `user_material_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_post`
--
ALTER TABLE `user_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_post_aoi`
--
ALTER TABLE `user_post_aoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `user_post_images`
--
ALTER TABLE `user_post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_profileimage`
--
ALTER TABLE `user_profileimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
