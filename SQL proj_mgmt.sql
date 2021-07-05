-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 05:40 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `choice_content` varchar(300) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choice`
--

INSERT INTO `choice` (`id`, `question_id`, `choice_content`, `weight`) VALUES
(1, 1, '$1-5 million ', 1),
(2, 1, '$5-10 million ', 2),
(3, 1, '$10-25 million ', 3),
(4, 1, '$25-100 million ', 4),
(5, 1, 'over $100 million', 5),
(6, 2, 'No procurement is required', 1),
(7, 2, 'under 25 per cent ', 2),
(8, 2, '26-50 per cent ', 3),
(9, 2, '51-75 per cent ', 4),
(10, 2, 'over 75 per cent', 5),
(11, 3, 'Small', 1),
(12, 3, 'Medium', 3),
(13, 3, 'Large', 5),
(14, 4, 'under 10', 1),
(15, 4, '10-25', 2),
(16, 4, '26-100', 3),
(17, 4, '101-250', 4),
(18, 4, 'over 250', 5),
(19, 5, 'under 12 months', 1),
(20, 5, '12-24 months', 2),
(21, 5, '24-36 months ', 3),
(22, 5, '36-48 months ', 4),
(23, 5, 'over 48 months', 5),
(24, 6, 'The project involves only one department or agency. ', 1),
(25, 6, 'The project involves another department or agency. ', 2),
(26, 6, 'The project involves two other departments or agencies. ', 3),
(27, 6, 'The project involves three other departments or agencies. ', 4),
(28, 6, 'The project involves at least four other departments or agencies.', 5),
(29, 7, 'The outcome of this project will affect one business process within a sector ', 1),
(30, 7, 'The outcome of this project will affect multiple business processes within a sector. ', 2),
(31, 7, 'The outcome of this project will affect multiple sectors. ', 3),
(32, 7, 'The outcome of this project will affect multiple branches. ', 4),
(33, 7, 'The outcome of this project will affect multiple departments or agencies.', 5),
(34, 8, 'Support for all factors is demonstrated', 1),
(35, 8, 'Support for three of the factors is demonstrated. ', 2),
(36, 8, 'Support for two of the factors is demonstrated. ', 3),
(37, 8, 'Support for one of the factors is demonstrated. ', 4),
(38, 8, 'Support is not demonstrated for any of the factors.', 5),
(39, 9, 'Both criteria are met. ', 1),
(40, 9, 'One of the two criteria is met. ', 3),
(41, 9, 'None of the criteria are met.', 5),
(42, 10, 'Both criteria are met. ', 1),
(43, 10, 'One of the two criteria is met. ', 3),
(44, 10, 'None of the criteria are met.', 5),
(45, 11, 'No, the project is not susceptible. ', 1),
(46, 11, 'Yes, the project is moderately susceptible; time delays will have minor effects on the schedule. ', 3),
(47, 11, 'Yes, the project is highly susceptible; time delays will have major effects on the schedule.', 5),
(48, 12, 'Neither statement applies. ', 1),
(49, 12, 'One statement is true. ', 3),
(50, 12, 'Both statements are true.', 5),
(51, 13, 'No', 1),
(52, 13, 'Yes', 5),
(53, 14, 'No', 1),
(54, 14, 'Yes', 5),
(55, 15, 'Appropriate facilities are available to conduct the project. ', 1),
(56, 15, 'Facilities available to the project are inadequate. ', 3),
(57, 15, 'Facilities are unavailable for the project.', 5),
(58, 16, 'No', 1),
(59, 16, 'Yes', 5),
(60, 17, 'No', 1),
(61, 17, 'Yes', 5),
(62, 18, 'No', 1),
(63, 18, 'Yes', 5),
(64, 19, 'The project is directly aligned and it explicity contributes to the strategic outcomes of the organization or program. ', 1),
(65, 19, 'There is good alignment with the strategic outcome and there is an indirect contribution to the strategic outcomes of the organization or program. ', 3),
(66, 19, 'There is a weak alignment with the strategic outcomes, or the strategic outcomes have not been established. ', 5),
(67, 20, 'The project is a critical priority: all resources necessary will be allocated to it. ', 1),
(68, 20, 'The project is a normal priority: resources may be shared with a project of equal or higher priority. ', 5),
(69, 21, 'The business case is compelling, and value is extensively documented, OR a business case is not required. ', 1),
(70, 21, 'The business case provides a good demonstration of value; some details require further clarification. ', 3),
(71, 21, 'The business case does not demonstrate value or is not complete. ', 5),
(72, 22, 'There is consistent, clear, and comprehensive understanding of the project at all relevant levels. ', 1),
(73, 22, 'There is good general awareness of the project, its implications, and its budget. ', 3),
(74, 22, 'There is minimal awareness of the project in relevant levels of the organization. ', 5),
(75, 23, 'Yes, there is a project communications plan. ', 1),
(76, 23, 'The project communications plan has not yet been completed. ', 3),
(77, 23, 'No, a project communications plan does not exist. ', 5),
(78, 24, 'All four criteria are met.', 1),
(79, 24, 'Three of the four criteria are met. ', 2),
(80, 24, 'Two of the four criteria are met. ', 3),
(81, 24, 'One of the four criteria is met. ', 4),
(82, 24, 'None of the four criteria are met. ', 5),
(83, 25, 'addresses all project requirements. ', 1),
(84, 25, 'is high-level and adequately describes required procurement activities. ', 3),
(85, 25, 'is incomplete or inappropriate for the project. ', 5),
(86, 26, 'There are qualified suppliers in the market willing to work with the Government of Canada. ', 1),
(87, 26, 'There is a limited number of qualified suppliers in the market or some suppliers are reluctant to work with the Government of Canada. ', 3),
(88, 26, 'There is only one supplier or there are no qualified suppliers that can meet the requirements. ', 5),
(89, 27, 'There is no potential for products, goods, or services not being readily supplied. ', 1),
(90, 27, 'There is a slight potential for slippage of project schedule due to procurement complexity or vendor challenges. ', 3),
(91, 27, 'There is a potential that the project deliverables, schedule, or budget may be seriously affected by limited qualified bidders, significant request-for-proposal process delays, or extended challenges. ', 5),
(92, 28, 'All statements are true. ', 1),
(93, 28, 'Two statements are true. ', 2),
(94, 28, 'One statement is true. ', 4),
(95, 28, 'None of the statements are true. ', 5),
(96, 29, 'One contract. ', 1),
(97, 29, 'Two contracts. ', 2),
(98, 29, 'Three contracts. ', 3),
(99, 29, 'Four contracts. ', 4),
(100, 29, 'Five or more contracts. ', 5),
(101, 30, 'None of the statements are true. ', 1),
(102, 30, 'One statement is true. ', 3),
(103, 30, 'Two statements are true. ', 4),
(104, 30, 'All of the statements are true. ', 5),
(105, 31, 'directed (sole-source, Advance Contract Award Notice - ACAN). ', 1),
(106, 31, 'a standing offer call-up. ', 2),
(107, 31, 'a supply arrangement procurement. ', 4),
(108, 31, 'a public tender (request for quotation, invitation to tender, request for proposal). ', 5),
(109, 32, 'All statements are true. ', 1),
(110, 32, 'Four statements are true. ', 2),
(111, 32, 'Three statements are true. ', 3),
(112, 32, 'Two statements are true. ', 4),
(113, 32, 'One or none of the statements are true. ', 5),
(114, 33, 'Yes, or not required. ', 1),
(115, 33, 'This is planned but not yet in place. ', 3),
(116, 33, 'No. ', 5),
(117, 34, 'No', 1),
(118, 34, 'Yes', 5),
(119, 35, 'All three criteria are met.', 1),
(120, 35, 'Two of the three criteria are met. ', 2),
(121, 35, 'One of the three criteria is met. ', 4),
(122, 35, 'None of the three criteria are met. ', 5),
(123, 36, 'over 80 per cent ', 1),
(124, 36, '61-80 per cent ', 2),
(125, 36, '41-60 per cent ', 3),
(126, 36, '20-40 per cent ', 4),
(127, 36, 'under 20 per cent or all part-time', 5),
(128, 37, 'All three criteria are met. ', 1),
(129, 37, 'Two of the three criteria are met. ', 2),
(131, 37, 'One of the three criteria is met. ', 4),
(132, 37, 'None of the three criteria are met. ', 5),
(133, 38, 'Yes', 1),
(134, 38, 'No', 5),
(135, 39, 'Project will fit with the organization\'s current processes, use existing workforce and skills, and not require substantial changes to technology and other infrastructure. ', 1),
(136, 39, 'Some changes to processes, staffing models, or technology will be required. ', 3),
(137, 39, 'Significant restructuring of business processes, staffing requirements, partner relationships, and infrastructure will be required. ', 5),
(138, 40, 'Change management will be required and a change management plan has been prepared. Alternatively, there are no significant change management requirements. ', 1),
(139, 40, 'Change management will be required and preparation of a change management plan is incorporated or included in the project management plan. ', 3),
(140, 40, 'Change management will be required but there are no plans to establish a change management plan. ', 5),
(141, 41, 'No public participation is required for project success. ', 1),
(142, 41, 'Limited public participation is required for project success. ', 2),
(143, 41, 'Moderate public participation is required for project success. ', 4),
(144, 41, 'Extensive public participation is required for project success. ', 5),
(145, 42, 'No legal review is required; no legislative changes are required; legal costs and effort are assessed as low. ', 1),
(146, 42, 'One or more risk events will likely occur resulting in legal costs and effort; a legal review has been completed. ', 2),
(147, 42, 'One or more risk events will likely occur resulting in legal costs and effort; a legal review has not been completed. ', 3),
(148, 42, 'There is a high probability of liability and other legal risks; extensive legal resources will be required during the project; legislative change is required to implement the project; a legal review has been completed. ', 4),
(149, 42, 'There is a high probability of liability and other legal risks; extensive legal resources will be required during the project; legislative change is required to implement the project; a legal review has not been completed. ', 5),
(150, 43, 'The project fully complies with all applicable policies. Alternatively, the project is not subject to any of these policies. ', 1),
(151, 43, 'There are some challenges associated with policy requirements, but the project team is adequately equipped to address these. ', 3),
(152, 43, 'There are some challenges associated with policy requirements and there is a lack of confidence that policy requirements can be met on schedule and within the budget. ', 5),
(153, 44, 'All elements are defined. ', 1),
(154, 44, 'Five or six elements are defined. ', 2),
(155, 44, 'Three or four elements are defined. ', 3),
(156, 44, 'One or two elements are defined. ', 4),
(157, 44, 'No plan has been completed. ', 5),
(158, 45, 'All three criteria are met. ', 1),
(159, 45, 'Two of the three criteria are met. ', 2),
(160, 45, 'One of the three criteria is met. ', 4),
(161, 45, 'None of the three criteria are met. ', 5),
(162, 46, 'Yes', 1),
(163, 46, 'The development of a project reporting and control process is a planned activity, but not yet completed.', 3),
(164, 46, 'No', 5),
(165, 47, 'All four disciplines. ', 1),
(166, 47, 'Three of the disciplines. ', 2),
(167, 47, 'Two of the disciplines. ', 3),
(168, 47, 'One of the disciplines. ', 4),
(169, 47, 'None of the disciplines. ', 5),
(170, 48, 'All three criteria are met, OR a risk management plan is not required. ', 1),
(171, 48, 'Two of the three criteria are met. ', 2),
(172, 48, 'One of the three criteria is met. ', 4),
(173, 48, 'None of the three criteria are met. ', 5),
(174, 49, 'Comprehensive information management practices are in place or planned to support the project throughout its life cycle. ', 1),
(175, 49, 'Standard IM practices are planned or in place and resourced. ', 3),
(176, 49, 'Minimal IM practices are in place or planned within the project. ', 5),
(177, 50, 'None of the statements are true. ', 1),
(178, 50, ' One of the statements is true. ', 2),
(179, 50, 'Two of the statements are true. ', 3),
(180, 50, 'Three of the statements are true. ', 4),
(181, 50, 'All of the statements are true. ', 5),
(182, 51, 'Four of the statements are true. ', 1),
(183, 51, 'Three of the statements are true. ', 2),
(184, 51, 'Two of the statements are true. ', 3),
(185, 51, 'One of the statements is true. ', 4),
(186, 51, 'None of the statements are true. ', 5),
(187, 52, 'All sources/methods have been employed and verified. ', 1),
(188, 52, 'All sources/methods have been employed but have not been verified. ', 2),
(189, 52, 'Some sources/methods have been employed. ', 3),
(190, 52, 'Few sources/methods have been employed. ', 4),
(191, 52, 'No information has been gathered or is available. ', 5),
(192, 53, 'Yes', 1),
(193, 53, 'Validation is a planned activity but has not yet been completed. ', 3),
(194, 53, 'No ', 5),
(195, 54, 'Feasibility studies are not required, because none of the requirements are technically difficult to implement. ', 1),
(196, 54, 'Feasibility studies were conducted and there is confidence in the assumptions made. ', 2),
(197, 54, 'Feasibility studies were conducted, but there is not complete confidence in the assumptions made. ', 4),
(198, 54, 'Feasibility studies were necessary but not conducted. ', 5),
(199, 55, 'under 10 per cent ', 1),
(200, 55, '20 per cent ', 2),
(201, 55, '30 per cent ', 3),
(202, 55, '40 per cent ', 4),
(203, 55, 'over 40 per cent ', 5),
(204, 56, 'All requirements are clear, complete, and communicated. ', 1),
(205, 56, 'Up to 10 per cent of total requirements are not complete or are undocumented. ', 3),
(206, 56, 'More than 10 per cent of total requirements are not complete or are unclear. ', 5),
(207, 57, 'All of the project characteristics are expected to remain stable. ', 1),
(208, 57, 'Five of the six project characteristics are expected to remain stable. ', 2),
(209, 57, 'Four of the six project characteristics are expected to remain stable.', 3),
(210, 57, 'Three of the six project characteristics are expected to remain stable. ', 4),
(211, 57, 'Two or less of the project characteristics are expected to remain stable.', 5),
(212, 58, 'No', 1),
(213, 58, 'Yes', 5),
(214, 59, 'No', 1),
(215, 59, 'Yes', 5),
(216, 60, 'There are few complex integration requirements; activities to specify integration are included in the project management plan. ', 1),
(217, 60, 'There is adequate understanding and planning for integration. ', 3),
(218, 60, 'There are highly complex or numerous integration requirements and insufficient planning of required activities. ', 5),
(219, 61, 'There are few complex integration requirements; activities to specify integration are included in the project management plan. ', 1),
(220, 61, 'There is adequate understanding and planning for integration.', 3),
(221, 61, 'There are highly complex or numerous integration requirements and insufficient planning of required activities. ', 5),
(222, 62, 'Small ', 1),
(223, 62, 'Medium ', 3),
(224, 62, 'Large ', 5),
(225, 63, 'Yes ', 1),
(226, 63, 'No, OR no critical path analysis has been performed. ', 5),
(227, 64, 'No scarce resources are required OR not applicable. ', 1),
(228, 64, 'The project will incur minor delays or minor cost overruns due to scarcity of resources. ', 2),
(229, 64, 'The project will incur moderate delays or moderate cost overruns due to scarcity of resources. ', 3),
(230, 64, 'The project will incur significant delays or significant cost overruns due to scarcity of resources and must return to Treasury Board for revised approval. ', 4),
(231, 64, 'The success of the project is critically dependent on scarce resources. ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `owner` varchar(128) NOT NULL,
  `financial` int(11) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `mode` varchar(20) NOT NULL,
  `complexity` varchar(20) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `owner`, `financial`, `duration`, `mode`, `complexity`, `rating`) VALUES
(1, 'John Smith Independent', 'Jonesy', 238794, '051201', 'Outsource', 'Tactical', 48),
(2, 'Cat Liquidation Project', 'Andre', 2780453, '040612', 'Unspecified', 'Evolutionary', 69),
(3, 'Hirule Co', 'Hirule ', 245312, '120214', 'Insource', 'Tactical', 56);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `section_num` int(11) NOT NULL,
  `question_num` int(11) NOT NULL,
  `question_content` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `section_num`, `question_num`, `question_content`) VALUES
(1, 1, 1, '<b>1. What is the total project cost estimate?  \r\n\r\n</b><br><br>'),
(2, 1, 2, '<br><b>2. What percentage of the total project cost estimate is for procurement?   \r\n\r\n</b><br><br>'),
(3, 1, 3, '<br><b>3. Relative to the average project in your organization, which of the following adjectives describes the total project cost estimate?    \r\n\r\n</b><br><br>'),
(4, 1, 4, '<br><b>4. How many people (part-time or full-time on the project, including Government of Canada \r\nemployees and individual contractors) are required to complete this project at \r\nits peak activity? \r\n\r\n</b><br><br>'),
(5, 1, 5, '<br><b>5. From project defintion to project close-out, what is the expected duration of the project?  \r\n\r\n</b><br><br>'),
(6, 1, 6, '<br><b>6. How many sponsoring or funding departments or agencies are involved? \r\n\r\n</b><br><br>'),
(7, 1, 7, '<br><b>7. How will the outcome of this project change or directly affect business processes, sectors, \r\nbranches and other departments and agencies? \r\n\r\n</b><br><br>'),
(8, 1, 8, '<br><b>8. The proposed or established project governance structure demonstrates adequate support for how many of the following project factors? \r\n\r\n<br><br>a.Appropriate representation of stakeholders and executive management; \r\n<br><br>b.Documented decision-making processes; \r\n<br><br>c.Documented roles, responsibilities, and authorities within the governance structure; and \r\n<br><br>d.Documented information requirements. \r\n\r\n</b><br><br>'),
(9, 1, 9, '<br><b>9. In supporting the achievement of the expected outcomes, how many of the following criteria \r\napply to the total project cost estimate (either indicative cost estimate or substantive cost estimate)? \r\n\r\n<br><br>a.Cost estimates are generated at the work-package level. \r\n<br><br>b.Cost estimates are based on historical data or industry benchmarks.\r\n\r\n</b><br><br>'),
(10, 1, 10, '<br><b>10. In supporting the achievement of the expected outcomes, how many of the following criteria apply to the costing model? \r\n\r\n<br><br>a.The source of funds has been identified within departmental reference levels. \r\n<br><br>b.The funds have been internally committed. \r\n\r\n</b><br><br>'),
(11, 1, 11, '<br><b>11. Is the project susceptible to time delays? Time delays can have a number of causes, such as the following: \r\n\r\n<br><br>a.Changes in technology;\r\n<br><br>b.Requirements of participating organizations;\r\n<br><br>c.Seasonal considerations;\r\n<br><br>d.The need for policy approvals; and\r\n<br><br>e.External influences\r\n\r\n</b><br><br>'),
(12, 1, 12, '<br><b>12. Do geographical considerations influence the manner in which the project is conducted? Consider the following statements: \r\n\r\n<br><br>a.Project activities or team members are distributed across a wide geographical area. \r\n<br><br>b.The project will be conducted in a remote or difficult location. \r\n\r\n</b><br><br>'),
(13, 1, 13, '<br><b>13. Do environmental considerations influence the manner in which the project is conducted? \r\n\r\n</b><br><br>'),
(14, 1, 14, '<br><b>14. Are there any socio-economic considerations that must be taken into account? \r\n\r\n</b><br><br>'),
(15, 1, 15, '<br><b>15. Consider how the availability of facilities will influence the manner in which the project is conducted: \r\n\r\n</b><br><br>'),
(16, 1, 16, '<br><b>16. Does public perception influence the manner in which the project is conducted? \r\n\r\n</b><br><br>'),
(17, 1, 17, '<br><b>17. Do considerations relating to Aboriginal people (including land claims and \r\nAboriginal consultation obligations) influence the manner in which the project is conducted? \r\n\r\n</b><br><br>'),
(18, 1, 18, '<br><b>18. Do health and safety requirements add significant complexity to the requirements for this project? \r\n\r\n</b><br><br>'),
(19, 2, 19, '<b>19. How well and how clearly does the project align with the organization\'s mandate and strategic outcomes? \r\n\r\n</b><br><br>'),
(20, 2, 20, '<br><b>20. What level of priority is the project to the organization? \r\n\r\n</b><br><br>'),
(21, 2, 21, '<br><b>21. How thoroughly does the project business case demonstrate the value of the project to the organization?\r\n\r\n</b><br><br>'),
(22, 2, 22, '<br><b>22. To what degree is the organization\'s management and relevant stakeholders aware of the project? \r\n\r\n</b><br><br>'),
(23, 2, 23, '<br><b>23. Does the project have a communications plan? \r\n\r\n</b><br><br>'),
(24, 2, 24, '<br><b>24. How extensive is the commitment of the organization\'s senior executive management, \r\nstakeholders, partners, and project sponsors to the timely and \r\nsuccessful completion of this project? Consider the following criteria:\r\n\r\n<br><br>a.A senior project sponsor or management champion is engaged. \r\n<br><br>b.Stakeholders and partners are willing to reallocate resources if necessary.\r\n<br><br>c.Senior executive management oversight is in place. \r\n<br><br>d.Commitment from all stakeholders is confirmed.\r\n\r\n</b><br><br>'),
(25, 3, 25, '<br><b>25. The documented project procurement strategy: \r\n\r\n</b><br><br>'),
(26, 3, 26, '<br><b>26. What is the supplier availability and willingness? \r\n\r\n</b><br><br>'),
(27, 3, 27, '<br><b>27. Will the appropriate products, goods, or services be supplied in a timely manner \r\n(according to specified contract delivery dates or required delivery dates) within the expected cost envelope by a qualified supplier?\r\n\r\n</b><br><br>'),
(28, 3, 28, '<br><b>28. How many of the following statements are true? \r\n\r\n<br><br>a.The personnel involved in the project\'s procurement component have expertise in writing specifications or contracts. \r\n<br><br>b.The personnel involved in the project\'s procurement component have subject-matter expertise in the goods or services being procured. \r\n<br><br>c.There is a robust review process for contract award. \r\n\r\n</b><br><br>'),
(29, 3, 29, '<br><b>29. How many separate contracts associated with key deliverables are planned for this project? \r\n\r\n</b><br><br>'),
(30, 3, 30, '<br><b>30. How many of the following statements are true? \r\n\r\n<br><br>a.The firm or individual obtaining the contract will subcontract to other companies \r\n<br><br>b.Contracts are subject to trade agreements\r\n<br><br>c.The results of the contract are dependent on the results of another contract.  \r\n\r\n</b><br><br>'),
(31, 3, 31, '<br><b>31. Based on the contract, consider the degree of control over supplier selection and anticipated contract style. \r\n\r\n</b><br><br>'),
(32, 3, 32, '<br><b>32. How many of the following statements pertaining to contract management are true? \r\n\r\n<br><br>a.The personnel who wrote the contract are involved in the management of the contract. \r\n<br><br>b.There is a standardized acceptance process for the review of the completion of contracts (e.g. peer reviewing or field trials). \r\n<br><br>c.The lines of communication between the contract authority and the contractor are well-defined and regularized.\r\n<br><br>d.There is a standardized process for reporting progress (e.g. punctual evaluation or regular meetings). \r\n<br><br>e.There is a mechanism in place to address any contractual disagreements between parties regarding the completion of a contract. \r\n\r\n</b><br><br>'),
(33, 3, 33, '<br><b>33. Has PWGSC or a delegated contracting authority been formally engaged through a \r\nservice agreement to provide adequate support for the procurement process? \r\n\r\n</b><br><br>'),
(34, 4, 34, '<b>34. Does the organization anticipate a shortage of available personnel with appropriate skills during a significant period of the project? \r\n\r\n</b><br><br>'),
(35, 4, 35, '<br><b>35. What is the predicted stability of the project team? Consider the following criteria:  \r\n\r\n<br><br>a.The project team has previously worked together. \r\n<br><br>b.A low rate of turnover is expected. \r\n<br><br>c.It is expected that a suitable replacement will be readily available. \r\n\r\n</b><br><br>'),
(36, 4, 36, '<br><b>36. What percentage of the project team is assigned full-time to the project? \r\n\r\n</b><br><br>'),
(37, 4, 37, '<br><b>37. Consider the following criteria regarding knowledge and experience:\r\n\r\n<br><br>a.The project will use a proven approach. \r\n<br><br>b.This type of project has been done before in the Government of Canada. \r\n<br><br>c.The project will use resources that have been applied to this type of project before. \r\n\r\n</b><br><br>'),
(38, 4, 38, '<br><b>38. Has the assigned project manager worked on a project of this size and complexity before? \r\n\r\n</b><br><br>'),
(39, 5, 39, '<b>39. Describe the overall effect of this project on the organization:\r\n\r\n</b><br><br>'),
(40, 5, 40, '<br><b>40. Does the project have a change management plan? \r\n\r\n</b><br><br>'),
(41, 5, 41, '<br><b>41. What is the level of public involvement required to achieve expected outcomes? \r\n\r\n</b><br><br>'),
(42, 5, 42, '<br><b>42. What level of legal risk will be introduced by this project through the addition \r\nof new liabilities, regulatory requirements, and legislative changes?  \r\n\r\n</b><br><br>'),
(43, 5, 43, '<br><b>43. Are there expected challenges to ensure that this project complies with relevant Treasury Board \r\npolicy requirements, such as those regarding security, accessibility, \r\ncommon look and feel standards for the Internet, and management of government information? \r\n\r\n</b><br><br>'),
(44, 6, 44, '<b>44. How many of the following elements are defined in the project management plan? \r\n\r\n<br><br>a.scope \r\n<br><br>b.costs\r\n<br><br>c.schedule\r\n<br><br>d.project controls\r\n<br><br>e.risks\r\n<br><br>f.deliverables\r\n<br><br>g.team or skills \r\n\r\n</b><br><br>'),
(45, 6, 45, '<br><b>45. To indicate the extent of the project team\'s being appropriately organized to undertake a \r\nproject of this scope, how many of these criteria are met? \r\n\r\n<br><br>a.Project team composition, resource levels, and roles and responsibilities are defined and documented. \r\n<br><br>b.Resources are dedicated (i.e. available when required). \r\n<br><br>c.Responsibilities and required authorities for managers and leads within the project team are defined and documented. \r\n\r\n</b><br><br>'),
(46, 6, 46, '<br><b>46. Has a project reporting and control process appropriate for the project been documented? \r\n\r\n</b><br><br>'),
(47, 6, 47, '<br><b>47. How many of the following disciplines will, or does the project employ? \r\n\r\n<br><br>a.Quality assurance \r\n<br><br>b.Risk management \r\n<br><br>c.Outcome management \r\n<br><br>d.Issue management\r\n\r\n</b><br><br>'),
(48, 6, 48, '<br><b>48. Has a risk management plan been completed, and to what degree have appropriate contingency plans been included which respond to the risks as identified in the plan?\r\n<br>Consider the following criteria: \r\n\r\n<br><br>a.Identified risks have been assessed and prioritized.  \r\n<br>b.Appropriate controls and mitigations are in place for all significant residual risks. \r\n<br>c.A risk management plan has been integrated into the project management plan. \r\n\r\n</b><br><br>'),
(49, 6, 49, '<br><b>49. Is an appropriate information management (IM) process planned or in place to collect, distribute,\r\n and protect relevant and important project information, such as designs, \r\nproject plans, baseline, and registers? \r\n\r\n</b><br><br>'),
(50, 7, 50, '<b>50. How many of the following statements are true? \r\n\r\n<br><br>a.The project solution requires a high degree (greater than normal) of availability. \r\n<br><br>b.The project solution requires customization beyond normal configuration. \r\n<br><br>c.The project solution requires a high degree of performance quality. \r\n<br><br>d.The project solution requires a high degree of reliability. \r\n\r\n</b><br><br>'),
(51, 7, 51, '<br><b>51. In defining project requirements, how many of the following statements are true? \r\n\r\n<br><br>The requirements can be defined with very few people. \r\n<br><br>b.The requirements can be defined in a short period of time. \r\n<br><br>c.There are a small number of individual requirements to define. \r\n<br><br>d.The requirements do not require a high degree of detail. \r\n\r\n</b><br><br>'),
(52, 7, 52, '<br><b>52.To what extent have available sources/methods been employed and verified \r\nto provide information for this project as applicable (e.g. research, \r\nconsultations, workshops, surveys, and existing documentation)? \r\n\r\n</b><br><br>'),
(53, 7, 53, '<br><b>53. Have the business requirements been validated with users with \r\nan appropriate technique, such as walk-throughs, workshops, and \r\nindependent verification and validation? \r\n\r\n</b><br><br>'),
(54, 7, 54, '<br><b>54. Have feasibility studies been conducted, and is there confidence in the \r\nassumptions made in the feasibility studies? \r\n\r\n</b><br><br>'),
(55, 7, 55, '<br><b>55. What percentage of tasks cannot be fully defined until the \r\ncompletion of previous tasks? These are tasks that may be understood but \r\ncannot be documented in detail due to dependency on results from a previous task. \r\n</b><br><br>'),
(56, 7, 56, '<br><b>56. To what extent are the project\'s requirements clear, completed, and communicated?\r\n\r\n</b><br><br>'),
(57, 7, 57, '<br><b>57. How many of the following project characteristics are expected to remain stable?\r\n\r\n<br><br>a.Quality \r\n<br><br>b.Functionality\r\n<br><br>c.Schedule\r\n<br><br>d.Integration\r\n<br><br>e.Design\r\n<br><br>f.Testing\r\n\r\n</b><br><br>'),
(58, 7, 58, '<br><b>58. Are any other projects dependent on outputs or outcomes of this project? \r\n\r\n</b><br><br>'),
(59, 7, 59, '<br><b>59. Are outcomes of this project dependent on the outputs and/or outcomes of any other projects? \r\n\r\n</b><br><br>'),
(60, 7, 60, '<br><b>60. What degree of integration with externalities, such as other projects, systems, \r\ninfrastructure, or organizations, is required? \r\n\r\n</b><br><br>'),
(61, 7, 61, '<br><b>61. What degree of integration is required within the project? \r\n\r\n</b><br><br>'),
(62, 7, 62, '<br><b>62. Relative to the average (typical) project in your organization, which of \r\nthe following adjectives describes the number of tasks, elements, or \r\ndeliverables in the work breakdown structure? \r\n\r\n</b><br><br>'),
(63, 7, 63, '<br><b>63. Does the project schedule accommodate the critical path of the project, including appropriate contingencies?\r\n\r\n</b><br><br>'),
(64, 7, 64, '<br><b>64. What is the effect on the project of the requirement for scarce resources or resources that are in very high demand? \r\n\r\n</b><br><br>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type`) VALUES
(1, 'Andre', '123', 'projMgr'),
(2, 'Aous', '123', 'sysAdmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choice`
--
ALTER TABLE `choice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `question_fk` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
