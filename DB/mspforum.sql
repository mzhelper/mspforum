-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Agu 2024 pada 05.25
-- Versi server: 10.6.16-MariaDB-cll-lve
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u5551969_mspforum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_admin`
--

CREATE TABLE `kg_admin` (
  `id` int(11) NOT NULL,
  `id_admin_grup` smallint(6) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` enum('Active','InActive') NOT NULL DEFAULT 'Active',
  `modify_date` datetime DEFAULT current_timestamp(),
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `create_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_admin`
--

INSERT INTO `kg_admin` (`id`, `id_admin_grup`, `username`, `userpass`, `name`, `is_active`, `modify_date`, `modify_user_id`, `create_date`, `create_user_id`) VALUES
(1, 1, 'admin', '6ef9a13fc3261b0432a5707fccc51bb5', 'Admin', '', '2022-09-05 09:11:14', 1, '2012-05-21 12:12:06', 1),
(2, 2, 'register', '4ec9403574dacac34d3d78ff632290f8', 'Registrasi', '', '2024-03-12 22:33:13', 1, '2022-05-16 14:02:02', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_admin_auth`
--

CREATE TABLE `kg_admin_auth` (
  `id` int(7) NOT NULL,
  `id_admin_grup` tinyint(4) NOT NULL DEFAULT 0,
  `id_menu_admin` smallint(6) NOT NULL DEFAULT 0,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_admin_auth`
--

INSERT INTO `kg_admin_auth` (`id`, `id_admin_grup`, `id_menu_admin`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`) VALUES
(1, 1, 94, 0, '2020-02-16 06:13:52', 1, '2020-02-16 06:13:52'),
(2, 1, 83, 0, '2020-02-16 06:14:00', 1, '2020-02-16 06:14:00'),
(3, 1, 79, 0, '2020-02-16 06:14:10', 1, '2020-02-16 06:14:10'),
(4, 1, 81, 0, '2020-02-16 06:14:17', 1, '2020-02-16 06:14:17'),
(5, 1, 49, 1, '2022-05-16 14:01:40', 1, '2020-02-16 06:14:23'),
(6, 2, 49, 0, '2022-05-16 14:02:09', 1, '2022-05-16 14:02:09'),
(7, 1, 99, 0, '2022-11-03 10:18:38', 1, '2022-11-03 10:18:38'),
(8, 1, 100, 0, '2022-11-19 08:13:21', 1, '2022-11-19 08:13:21'),
(9, 1, 101, 0, '2022-11-23 13:58:01', 1, '2022-11-23 13:58:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_admin_grup`
--

CREATE TABLE `kg_admin_grup` (
  `id` smallint(6) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_admin_grup`
--

INSERT INTO `kg_admin_grup` (`id`, `title`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`) VALUES
(1, 'Administrator', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00'),
(2, 'Referensi', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_admin_log`
--

CREATE TABLE `kg_admin_log` (
  `id` bigint(20) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tabel` varchar(255) NOT NULL,
  `tabel_id` int(11) NOT NULL,
  `logs` text NOT NULL,
  `message` mediumtext NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_banner`
--

CREATE TABLE `kg_banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_eng` varchar(255) DEFAULT NULL,
  `headline` text DEFAULT NULL,
  `headline_eng` text DEFAULT NULL,
  `contents` longtext NOT NULL,
  `contents_eng` longtext DEFAULT NULL,
  `file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `file_mobile` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_desc` text DEFAULT NULL,
  `seo_title_eng` varchar(255) DEFAULT NULL,
  `seo_desc_eng` text DEFAULT NULL,
  `is_publish` tinyint(4) NOT NULL DEFAULT 1,
  `slug` text DEFAULT NULL,
  `link` text DEFAULT '#',
  `warna_head` varchar(255) DEFAULT NULL,
  `warna_caption` varchar(255) DEFAULT NULL,
  `urutan` tinyint(4) DEFAULT 20,
  `publish_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_banner`
--

INSERT INTO `kg_banner` (`id`, `title`, `title_eng`, `headline`, `headline_eng`, `contents`, `contents_eng`, `file`, `file_mobile`, `seo_title`, `seo_desc`, `seo_title_eng`, `seo_desc_eng`, `is_publish`, `slug`, `link`, `warna_head`, `warna_caption`, `urutan`, `publish_date`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`, `is_delete`) VALUES
(2, 'High Level Forum on Multi Stakeholder Partnership (HLF-MSP)', NULL, 'High-Level Forum on Multi-Stakeholder Partnership (HLF-MSP)', NULL, 'Click Here for More Information', NULL, '20240628061431.bali5.jpg', NULL, NULL, NULL, NULL, NULL, 0, 'High-Level-Forum-on-Multi-Stakeholder-Partnership-HLF-MSP', '', '#FFFFFF', '#FFFFFF', 2, '2024-06-28 06:12:00', 1, '2024-07-16 13:30:56', 1, '2024-06-28 06:14:31', 0),
(4, 'Welcome to High-Level Forum on Multi-Stakeholder Partnerships 2024', NULL, 'Welcome to \r\nHigh-Level Forum on Multi-Stakeholder Partnerships 2024', NULL, '', NULL, '20240711055654.Lowkv FLAT_RGB (1) (2).jpg', NULL, NULL, NULL, NULL, NULL, 1, 'Welcome-to-High-Level-Forum-on-Multi-Stakeholder-Partnerships-2024', '', '#FFFFFF', '#FFFFFF', 2, '2024-07-11 06:00:00', 1, '2024-07-25 14:07:53', 1, '2024-07-11 05:56:58', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_calender`
--

CREATE TABLE `kg_calender` (
  `id` int(11) NOT NULL,
  `id_calender_cat` tinyint(4) NOT NULL DEFAULT 1,
  `id_lokasi` smallint(6) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `title_eng` varchar(255) DEFAULT NULL,
  `headline` text DEFAULT NULL,
  `headline_eng` text DEFAULT NULL,
  `contents` longtext NOT NULL,
  `contents_eng` longtext DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image_mobile` varchar(255) DEFAULT NULL,
  `title_image` varchar(255) DEFAULT NULL,
  `title_image_mobile` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_desc` text DEFAULT NULL,
  `seo_title_eng` varchar(255) DEFAULT NULL,
  `seo_desc_eng` text DEFAULT NULL,
  `is_publish` tinyint(4) NOT NULL DEFAULT 0,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0,
  `slug` text DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL,
  `warna_head` varchar(255) DEFAULT NULL,
  `warna_caption` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_calender`
--

INSERT INTO `kg_calender` (`id`, `id_calender_cat`, `id_lokasi`, `title`, `title_eng`, `headline`, `headline_eng`, `contents`, `contents_eng`, `image`, `image_mobile`, `title_image`, `title_image_mobile`, `seo_title`, `seo_desc`, `seo_title_eng`, `seo_desc_eng`, `is_publish`, `is_featured`, `slug`, `kuota`, `warna_head`, `warna_caption`, `start_date`, `end_date`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`, `is_delete`) VALUES
(20, 4, 5, 'Cultural Event and Reception for All Delegates, Hosted by The Minister of National Development Planning, the Republic of Indonesia', NULL, '', NULL, '<p style=\"text-align:justify\">A captivating cultural event will take center stage on day 2 for all delegates.&nbsp;This semi-formal affair will showcase the rich heritage and diversity of Indonesia through a captivating array of artistic performances and entertaining acts hold in Taman Bhagawan, Bali. Also, embark on a culinary journey and&nbsp;savor the delectable flavors of traditional cuisine from various regions across the archipelago. Each dish is a testament to the culinary artistry and unique flavors that define Indonesia&#39;s gastronomic heritage. This cultural event also&nbsp;provides the perfect platform to exchange ideas and cultivate lasting connection, mingle with fellow participants, forge new relationships, and engage in stimulating dialogue.&nbsp;Join us for an unforgettable evening of cultural immersion, culinary delight, and celebration. The Cultural Night is a must-attend event for anyone seeking to experience the true essence of Indonesia.</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Cultural-Event-and-Reception-for-All-Delegates-Hosted-by-The-Minister-of-National-Development-Planning-the-Republic-of-Indonesia', 250, NULL, NULL, '2024-09-02 18:00:00', '2024-09-02 21:00:00', 1, '2024-07-25 11:57:23', 1, '2024-07-25 11:25:47', 0),
(16, 5, 3, 'Pathway Towards Global Circular Economy: Recalibrating Global Waste Governance in International Trade', NULL, '-358-,-16-', NULL, '<p style=\"text-align:justify\">The unsustainable nature of linear economic models in a world with finite resources has become evident and the realization has fueled a shift towards circular economies. While discussion and circular economy efforts are closely connected to domestic sphere, a transition towards a more resource efficient and circular economy has broad linkages with international trade. The circular economy may affect international trade patterns at multiple stages of a product&#39;s life: the sale of used goods, the recycling of end-of-life products, the movement of waste materials, and the growth of related services. International co-operation on circular economy value chains could be explored for possible harmonization of quality standards of materials, promoting demand for second-hand goods and secondary raw materials, to remove unnecessary regulatory barriers, avoid environmentally harmful activities, and to create demands in green job.</p>\r\n\r\n<p style=\"text-align:justify\">Although circular economy implementation promises to decouple growth from irreversible environmental harm, certain areas encounter complexities that could create unintended negative consequences that needed to be addressed if global circular economy is to be made equitable and fair across the border&mdash;one of the issues is on how we govern trade waste. In terms of trade in waste, imports by non-OECD countries declined by 9% between 2021 and 2022, from 2.2 Mt to 2.0 Mt. However, non-OECD countries, notably in the Southeast Asia region, remain among the largest importers of plastic waste and scrap.</p>\r\n\r\n<p style=\"text-align:justify\">It raises the question as whether the recipient country has sufficient environmentally sound waste management practices/capabilities in place and can treat waste in a sustainable fashion. In addition to preventing pollution, setting rules for the trade in waste can also ensure that the raw materials contained in the waste can be re-used or recycled and can thus help develop a sustainable circular economy. Other challenges are illegal waste trade and lack of data. Shipments which are not tracked escape controls and are more likely to end up disposed of or&nbsp;treated improperly, increasing environmental risks. Illegal trade in waste is also a missed opportunity to re-use and recycle materials. The discussion will delve into new principles needed on waste management and innovations in the sector to create a fair pathway towards a global circular economy.</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Pathway-Towards-Global-Circular-Economy-Recalibrating-Global-Waste-Governance-in-International-Trade', 100, NULL, NULL, '2024-09-03 11:00:00', '2024-09-03 12:30:00', 1, '2024-08-03 13:56:51', 1, '2024-07-25 11:17:49', 0),
(17, 5, 3, 'The Future of Work: Catalyzing Just Transition towards Green Jobs in Developing and Least Developed Countries', NULL, '-351-', NULL, '<p style=\"text-align:justify\">Our environment and our work are deeply intertwined. The health of our planet directly impacts businesses, jobs, and the resources and services that nature provides. Economic and social progress rests on a thriving environment. But climate change and environmental damage are already destabilizing these foundations, threatening jobs and livelihoods around the world. The transition to a low-carbon, resource-efficient economy will shift jobs, businesses, and entire economies. This transition, while potentially disruptive, also presents immense opportunities for economic growth, job creation, and better workplaces. Studies by the ILO reveal that implementing the Paris Agreement could generate 18 million more jobs by 2030 than simply continuing as we are.</p>\r\n\r\n<p style=\"text-align:justify\">According to ILO data, the global market for environmental products and services is projected to double from US$ 1,370 billion per year at present to US$ 2,740 billion by 2020. The renewable energy sector is a major driver of employment growth, with 2.3 million jobs created in recent years in the renewable energy sector. The prospects for job growth are substantial, with projections indicating a potential rise of 2.1 million in wind energy and 6.3 million in solar power by 2030. The opportunities lie vast ahead in various sectors, in agriculture sector for instance, biomass for energy and related industry is potentially expected to be employed 12 million people.</p>\r\n\r\n<p style=\"text-align:justify\">However, in the context of the Global South, jobs in the new sustainable energy sector are not distributed evenly across the world. China, Brazil, and India have already emerged as employment hubs, yet green jobs in developing and least developed countries mostly are in the initial stage. Consequently, demand for green jobs in developing and least developed countries is still limited, encompassing both newly created positions and the &lsquo;greening&rsquo; of existing ones towards environmentally friendly practices. The informal economy accounts for a large percentage of employment in most least developed countries, presenting a particular challenge to disseminating skills for green jobs. ILO also finds practices of &ldquo;green but not decent jobs&rdquo; in developing countries, include low-wage jobs installing solar panels, and jobs in shipbreaking or electronic waste recycling where occupational safety is inadequate. In many instances, these sectors are defined by their informal nature, hardship and occupational and&nbsp;health hazards. Lack of standardized occupational classification and expertise for green jobs remains challenging in this context.</p>\r\n\r\n<p style=\"text-align:justify\">A successful transition that unlocks opportunities for job creation and social development hinges on the development of well-coordinated policies. This necessitates a deep understanding of the interplay between environmental factors and policies, and how they affect labor markets. Such policies will require collaboration between various stakeholders. Maximizing these positive employment benefits from green jobs requires a conscious effort from governments, businesses, and workers, particularly by ensuring policy readiness in supporting green jobs transition and promotion in developing and least developed countries. It entails &ldquo;a country-specific mix of macroeconomic, industrial, sectoral and labor policies that create an enabling environment for sustainable enterprises to prosper and create decent work opportunities.</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'The-Future-of-Work-Catalyzing-Just-Transition-towards-Green-Jobs-in-Developing-and-Least-Developed-Countries', 100, NULL, NULL, '2024-09-03 15:30:00', '2024-09-03 17:00:00', 1, '2024-08-02 16:18:55', 1, '2024-07-25 11:18:20', 0),
(18, 5, 3, 'Clean Energy Conundrum: Securing Sustainable Critical Minerals Value Chains', NULL, '-349-,-17-,-350-', NULL, '<p style=\"text-align:justify\">Shifting to clean energy means moving away from fossil fuels and towards fundamentally different technologies. Unlike traditional energy systems, clean technologies rely heavily on minerals like copper, lithium, nickel, cobalt, and rare earths. As we move towards a greener future, the demand for these minerals is skyrocketing. According to IEA, Solar PV plants, wind farms and electric vehicles generally require more critical minerals to build than their fossil fuel-based counterparts. A typical electric car requires six times the mineral inputs of a conventional car and an offshore wind plant requires 13 times more mineral resources than a similarly sized gas-fired plant. The types of mineral resources used vary by technology. Lithium, nickel, cobalt, manganese and graphite are crucial to battery performance. Rare earth elements are essential for permanent magnets used in wind turbines and EV motors. Electricity networks need a huge amount of aluminium and copper, the latter of which is the cornerstone of all electricity-related technologies.</p>\r\n\r\n<p style=\"text-align:justify\">Moreover, the race for clean energy technology has ignited a global struggle for secure supply chains of rare earths and critical minerals, making these essential materials a major strategic concern. The challenge includes ensuring a reliable supply of critical minerals for green energy technologies amidst the geopolitical tensions it entails. As we rely more on critical minerals, policymakers face new challenges, namely concerns about price volatility, security of supply, and the shifting sands of geopolitics. The discussion will focus on how developing countries in the Global South, often home to rich deposits of critical minerals sources, could play a prominent role in critical minerals supply chain.</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Clean-Energy-Conundrum-Securing-Sustainable-Critical-Minerals-Value-Chains', 100, NULL, NULL, '2024-09-03 13:30:00', '2024-09-03 15:00:00', 1, '2024-08-03 11:49:57', 1, '2024-07-25 11:19:05', 0),
(19, 1, 1, 'Keynote Speech by Minister of National Development Planning, the Republic of Indonesia', NULL, '-3-', NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Keynote-Speech-by-Minister-of-National-Development-Planning-the-Republic-of-Indonesia', 100, NULL, NULL, '2024-09-02 14:00:00', '2024-09-02 14:15:00', 1, '2024-07-25 14:52:02', 1, '2024-07-25 11:24:36', 0),
(4, 4, 11, 'Welcoming Dinner for Heads of States, Hosted by the President of the Republic of Indonesia ', NULL, '', NULL, '<p>The evening commences with a Welcoming Dinner exclusively for heads of state. This prestigious event promises a captivating performances and&nbsp;an exquisite culinary journey alongside stimulating conversation with esteemed dignitaries. The Welcoming Dinner will be held in the Imperial Grand Ballroom of The Jimbaran Convention Center, one of the most renowned and enduring beachfront resorts built on the beautiful shores of Jimbaran Bay, overlooking the picturesque sunsets. The Welcoming Dinner is designated for Head of States.</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Welcoming-Dinner-for-Heads-of-States-Hosted-by-the-President-of-the-Republic-of-Indonesia', 50, NULL, NULL, '2024-09-01 18:00:00', '2024-09-01 21:00:00', 1, '2024-08-02 15:56:37', 999, '2024-07-10 07:02:28', 0),
(5, 2, 1, 'Policy Reform: Fostering Global South\'s Participation in the Global Supply Chain, Enabling Just and Equitable Global Trade', NULL, '', NULL, '<p style=\"text-align:justify\">The countries in the global south play a substantive role in the global supply chain. An UNCTAD report shows that in 2022, developing countries contribute to over half of the value of trade in goods and about two thirds of trade in services, with BRICS (Brazil, the Russian Federation, India, China, and South Africa) accounted for more than 40 percent of developing countries&rsquo; exports, while Least Developed Countries&rsquo; (LDCs) contribution to world trade remains small. A more polycentric landscape of global trade has created the opportunities for developing countries and LDCs to provide more goods and services beyond borders.</p>\r\n\r\n<p style=\"text-align:justify\">The integration of Least Developed Countries (LDCs) into multilateral trading systems is crucial for accelerating economic development. However, the target of doubling the LDCs&#39; share in the global market to 2% has not been met since the adoption of the Istanbul Plan of Action for LDCs (2011-2020) at the 4th UN Conference for LDCs. Instead, the share of LDCs in global exports declined from 0.95% to 0.91% during that period. The potential of developing countries, including LDCs, in global trade needs to be fully optimized, both through trade with the global north and among the global south itself. On the contrary, exports of developing economies to both developed (South-North) and developing (South-South) countries performed worse than average during the first half of 2023.</p>\r\n\r\n<p style=\"text-align:justify\">Increasing participation in global markets still faces various challenges, particularly in ensuring the effective implementation of special and differential treatment provisions for developing countries and LDCs. These provisions give developed countries the possibility to treat developing countries more favorably than other WTO Members,&nbsp;including: (i) longer time periods for implementing Agreements and commitments; (ii) measures to increase trading opportunities for developing countries; (iii) provisions requiring all WTO members to safeguard the trade interests of developing countries; (iv) support to help developing countries build the capacity to carry out WTO work, handle disputes, and implement technical standards, and (v) provisions related to LDC members. Therefore, it is crucial to develop an innovative approach in ensuring effective implementation of these commitments to promote a non-discriminatory and equitable multilateral trading system.</p>\r\n\r\n<p style=\"text-align:justify\">Developing countries encounter a dual challenge involving trade tariffs and nontariff measures (NTMs). While these measures aim to protect the industries and populations from potentially harmful goods, it could also limit the ability to compete in global export markets. According to the WTO World Tariff Profile 2023, developing countries face higher import tariffs (7.75%) compared to developed countries (3.43%). NTMs is also deemed to disproportionately benefit developed countries over developing countries due to the gap in technology access, capacity building, resource limitations, and market access. A specified case study by the OECD indicates that NTMs, such as technical regulations and standards, import licensing for certain technology-intensive products like machinery and electronics, as well as technical regulations and rules of origin for automotive products, are perceived to impede export and import activities particularly in developing countries.</p>\r\n\r\n<p style=\"text-align:justify\">Beside the external factors affecting the participation in the global trade, an effective collaboration is needed to strengthen the capacity of developing countries and LDCs in increasing exports. This includes advancing industrialization and strengthening domestic regulations to ensure that countries meet export standards in terms of both quality and quantity. Increased participation in global trade has been viewed as a catalyst to support a positive circle connecting jobs, investment, productivity, and incomes, thereby leading to transformative changes to accelerate the achievement of SDGs.</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Policy-Reform-Fostering-Global-Souths-Participation-in-the-Global-Supply-Chain-Enabling-Just-and-Equitable-Global-Trade', 100, NULL, NULL, '2024-09-03 09:00:00', '2024-09-03 10:30:00', 1, '2024-07-25 11:49:05', 1, '2024-07-10 14:32:50', 0),
(6, 2, 1, 'Redoubling Business Actors Participation In the Global Supply Chain', NULL, '-359-,-11-,-354-', NULL, '<p style=\"text-align:justify\">The share of exports from developing countries contributes to 41,6% in global trade. Despite the growing portion, it is still dominated by several higher-income countries. The variety of exports from developing countries remains low. This lack of diversification is further evidenced by data from the WTO. In 2021, developing countries on average exported only 461 different products compared to 1467 for developed countries. Additionally, the Export Concentration Index (higher values indicate concentration) shows developing economies (0.1) and LDCs (0.19) are more reliant on a few key exports compared to developed economies (0.06). Compounding this, WTO data indicates lower and middle-income countries (mostly developing) have fewer companies (average of 22,884 and 17,085) compared to high-income countries (mostly developed) with an average of 26,955 companies.</p>\r\n\r\n<p style=\"text-align:justify\">Due to the high concentration of products and companies, development in developing countries remains uneven. Hence, there is an urgent need to break the cycle of dependency on primary commodities and foster inclusive growth, and governments must create an enabling environment to foster the emergence of new types of products or industries in alignment with the country&#39;s resources and competitive advantages.</p>\r\n\r\n<p style=\"text-align:justify\">Business actors, particularly Micro, Small, and Medium Enterprises (MSMEs), continue to encounter challenges in meeting export standards and certifications. The complex administrative and bureaucratic systems also pose constraints on expanding the number of export-oriented businesses. Initiatives such as business incubators or accelerators have been introduced in several countries to develop seed programs and startups. Furthermore, e-commerce has contributed to broader participation by business actors.</p>\r\n\r\n<p style=\"text-align:justify\">To fully optimize the potential and participation of diverse business actors, comprehensive support is required from all stakeholders, including funding, legal frameworks, as well as mentorship and consultations.</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Redoubling-Business-Actors-Participation-In-the-Global-Supply-Chain', 100, NULL, NULL, '2024-09-03 13:30:00', '2024-09-03 15:00:00', 1, '2024-08-03 13:55:58', 1, '2024-07-10 14:33:33', 0),
(7, 2, 1, 'Innovate to Elevate: Multi-Stakeholder Partnerships for Promoting Higher Economic Value at the Regional Level', NULL, '-353-,-20-', NULL, '<p style=\"text-align:justify\">Economic transformation is marked by a shifting from low-value raw materials to highervalue manufactured products. By investing in technological advancements, developing economies will be able to provide higher economic value within global value chains. However, many developing economies face challenges due to limited access to modern technologies, resulting in exports predominantly comprising raw or semi-finished goods.</p>\r\n\r\n<p style=\"text-align:justify\">Modern technologies could be acquired through in-house research and development or licensing agreements, another option is acquiring technology through Foreign Direct Investment (FDI). However, this presents its own challenges. Many developing countries lack &quot;absorptive capacity&quot; &ndash; a skilled workforce, adequate infrastructure, and a strong knowledge base. This makes developed countries hesitant to transfer their technologies, fearing competition or insecure technology practices (leaks or breaches).</p>\r\n\r\n<p style=\"text-align:justify\">Despite many internal measures that developing countries need to undertake, developed countries&#39; role in transferring and accessing technology is fundamental. However, this role is hardly evident in the developed countries&rsquo; commitments in various international cooperation and fora, whether binding or non-binding. Although, as stipulated in Article 66.2 of the TRIPS Agreement (Trade-Related Aspects of Intellectual Property Rights), developed countries are required to provide incentives for companies and institutions to promote technology transfer to developing countries, the implementation of these commitments sometimes hindered by changes in domestic policies or related to nonbinding fora such as the G20 and APEC. The lack of sanctions for non-compliance in these fora result in developed countries not being obligated to fulfill these commitments.</p>\r\n\r\n<p style=\"text-align:justify\">In the longer term, successful technology transfers must also be accompanied by increased mutually beneficial cooperation and enthusiasm from higher-income countries to utilize these value-added products. Developing countries should synergize efforts to avoid unnecessary competition. Strengthening Regional Value Chains (RVCs) enhances competitive advantages, enabling countries to complement each other. As regional economic powerhouses, it is crucial to establish division of labor and responsibilities, allowing countries to specialize in products where they have a competitive advantage. This collaborative approach in production and marketing minimizes competition and promotes their respective strengths. By working together, developing countries can share production insights, simultaneously enhancing their industrial capabilities through specialization based on comparative advantage and contributing to specific product creation.</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Innovate-to-Elevate-Multi-Stakeholder-Partnerships-for-Promoting-Higher-Economic-Value-at-the-Regional-Level', 100, NULL, NULL, '2024-09-03 15:30:00', '2024-09-03 17:00:00', 1, '2024-08-01 22:25:27', 1, '2024-07-10 14:34:41', 0),
(8, 1, 4, 'Joint Opening Session HLF MSP 2024 and IAF II ', NULL, '', NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Joint-Opening-Session-HLF-MSP-2024-and-IAF-II', 100, NULL, NULL, '2024-09-02 09:00:00', '2024-09-02 12:00:00', 1, '2024-07-25 11:22:31', 1, '2024-07-11 11:45:08', 0),
(15, 5, 3, 'Unlocking the Blue Economy for Sustainable Growth: Creating Value and Promoting Investment to Improve Productivity', NULL, '-352-,-356-', NULL, '<p style=\"text-align:justify\">In recent decades, the world has witnessed a dramatic rise in marine activities, so scientists have named it &ldquo;Blue Acceleration.&rdquo; As state by International Seabed Authority (ISA), the interests of all humanity in the ocean and the conservation and sustainable use of its resources, make it imperative that the global governance regime reflects the maritime interests of all States, whether coastal or landlocked. The oceans, lakes, deltas, and rivers have bound countries across the continents together.</p>\r\n\r\n<p style=\"text-align:justify\">The reference of blue economy encompasses inland freshwater, taking into consideration the landlocked area, province, country, and region. The concept of the Blue Economy extends beyond traditional maritime nations and holds significant potential even for landlocked developing countries (LLDCs). Given the fact that, most of the landlocked states are the lessdeveloped countries, together with one of the most incremental principles of the Sustainable Development Goals (SDGs) of &ldquo;leave no one behind&rdquo;, the future implementation of blue economy requires a collaborative effort of all countries to achieve more prosperous, inclusive, and sustainable development. It encompasses a wide range of sectors, including fisheries, tourism, renewable energy, and marine biotechnology.</p>\r\n\r\n<p style=\"text-align:justify\">The future development of the blue economy will require the government&#39;s significant role in policy development and support for interventions from the investment side of the government and business actors. The development of blue economy investment is expected to provide incentives for the business world to transform their businesses towards inclusive and sustainable principles. Financing the blue economy is a future challenge that needs to be collaborated between all stakeholders.</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Unlocking-the-Blue-Economy-for-Sustainable-Growth-Creating-Value-and-Promoting-Investment-to-Improve-Productivity', 100, NULL, NULL, '2024-09-03 09:00:00', '2024-09-03 10:30:00', 1, '2024-08-02 16:32:48', 1, '2024-07-25 11:17:25', 0),
(10, 6, 2, 'Scaling Up SDGs Financing Effectiveness: Stronger Commitments, Greater Actions', NULL, '', NULL, '<p style=\"text-align:justify\">Currently, we have already seen significant political commitments translate into dedicated funds for developing countries. For instance, at the COP 15, the $100 billion/annum climate financing pledge was announced. Similarly, at the COP28, commitment to pool and manage resources specifically allocated to loss-and-damage was coined. Political commitments against development challenges are not completely new, reminiscing how as far back as from the 1970s, developed countries have agreed to allocate 0.7% of their GNI in helping the South achieve its development aid target. However, for the past decades, there has been a gap between commitment and actual contributions. In the context of ODA commitment, only 5 of the Development Assistance Committee (DAC) countries had consistently fulfilled their ODA commitment. In terms of climate financing, only per 2022 and 2023 did the developed nations fulfill their pledges for the first time. Hence, despite the efforts, commitments were not delivered timely - meaning that ways to maintain international political commitments of the developed nations shall be explored. This is particularly concerning especially since we are at the crossroad</p>\r\n\r\n<p style=\"text-align:justify\">The second challenge, despite a significant rise in international funds aimed at tackling global challenges, the principle of just and fair distribution is still not being upholded. Currently, one of the hindrances in ensuring just and fair access is the fact that development fund allocation has been largely politically-motivated. Though it is impossible to completely erase the factor out of the equation, it is important to ensure that it would not become the one sole driver. The prevalence of aforementioned practices could exacerbate the current gap of aid distribution - seeing how countries with similar risk profiles were not included in the fund delivery solely because it is not&nbsp;within the donors&#39; strategic interests. On the innovative financing side, accessing funds through innovative financing mechanisms can involve a wider range of approaches and implementation methods. In the area of climate finance, for example, there are currently over two dozen climate funds and initiatives (i.e Green Climate Fund, Global Environment Facility, Clean Technology Fund, UN-REDD Programme, etc). These initiatives are bounded with diverse mechanisms, implementing entities, procedures, and prerequisites - creating concerns regarding just and fair treatment when it comes to the access to the funds.</p>\r\n\r\n<p style=\"text-align:justify\">Another issue lies in lack of common standardization internationally to ensure the quantity and quality of the committed funds. For ODA, currently, amongst the barriers include the lack of commonly-agreed definition internationally amidst the broadening conception of what ODA consists of. This allows numerous other activities to be acknowledged under ODA when in reality, the contribution of such funds in recipient countries&rsquo; economy is unclear, or even unidentified (G&uuml;lseven, 2020). For other innovative financing instruments, the same case of lack of commonly-agreed standardization stems from the fact that each financial product is institutionalized individually. For instance, in the context of Green Financing, internationally, UNFCCC provides several funding pools, ranging from the Global Environment Facility, Green Climate Funds, to Adaptation Fund - each with its own corresponding standards. Hence, common measurement can be tricky. In tackling this challenge, the Four Effective Development Principles espoused by the Global Partnership for Effective Development Cooperation (GPEDC) through its Nairobi Document have gained prominence. This initiative seeks to promote efficient and effective global development cooperation, ensuring that development assistance, including ODA and other means of SDGs financing, is deployed efficiently to maximize impact on sustainable development outcomes. As reflected in the Nairobi Document, four shared effectiveness principles were coined worldwide, namely: 1) country ownership, 2) focus on results, 3) inclusive partnerships and 4) transparency and mutual accountability. While its existence showcased immense progress, it is relevant to further assess its suitability, and later ensure all these principles are met.</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Scaling-Up-SDGs-Financing-Effectiveness-Stronger-Commitments-Greater-Actions', 100, NULL, NULL, '2024-09-03 09:00:00', '2024-09-03 10:30:00', 1, '2024-07-25 16:14:41', 1, '2024-07-25 11:08:42', 0),
(11, 6, 2, 'Unlocking Growth: Overcoming Barriers and Optimizing Investment Returns through Smart Outbound-Inbound Strategies', NULL, '', NULL, '<p style=\"text-align:justify\">In the midst of multiple global crises, more Global South nations have started to embrace a dual role in global capital flow by tapping into outbound investment strategies. For instance, in the context of FDI, a consistent growth rate in OFDI coming from developing economies was apparent from 2010-2022 (UNCTAD, 2023). Such was further vouched as China became the third largest contributor of FDI capital outflow worldwide per Q3 of 2023 (OECD, 2024). In addition, this occurrence happened at such a strategic timing: amidst the decreasing flow of investment from the North - as stated on UNCTAD&#39;s 2023 Global Investment Trends Monitor.</p>\r\n\r\n<p style=\"text-align:justify\">The World Investment Report illustrated that in 2022, while developed countries allocated an outstanding approximate of USD1 trillion for outbound investment in a form of FDI, developing and least-developed countries only receive around USD 400 million collectively in the same year. Upon closer inspection, a similar trend is spotted upon the findings of investment flow in the largest contributor of global outbound FDI, which was allocated mostly to the developed. Meanwhile, for example, funds catered to countries in Asia-Pacific --the second largest regional destination&mdash;by the same country only reached around 23% of the total allocation. In addition, the dissected data of the increasing outbound investment to developing countries illustrates that there is an imbalance of distribution. For example, if examined regionally, more than three fourths of the total flow was pooled to Asia and Latin America (UNCTAD, 2024).</p>\r\n\r\n<p style=\"text-align:justify\">There is also a trend of outbound investment that goes out from developing countries, to either the Powerful South or the North altogether - contributing to enlarging funding South-North investment gap. For instance, among the largest emerging developing countries most of its investment is catered to the developed&nbsp;states (OECD, 2023). At most times, developing and least-developed countries are left behind in the global investment distribution due to many pain points, including the amount of non-mitigatable risks, quality of demography, limited infrastructures, and overall lack of enabling ecosystem for foreign investments to thrive.</p>\r\n\r\n<p style=\"text-align:justify\">In addressing the imbalanced distribution, it is necessary to transform the current investing pattern and explore ways to craft a more diverse portfolio to ensure a more accessible investment for all, while still maintaining satisfactory investment returns and resilience against global volatility. At the same time, it is about time that countries learn how to craft a national environment to encourage a larger volume of foreign investments.</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Unlocking-Growth-Overcoming-Barriers-and-Optimizing-Investment-Returns-through-Smart-Outbound-Inbound-Strategies', 100, NULL, NULL, '2024-09-03 11:00:00', '2024-09-03 12:30:00', 1, '2024-07-29 15:32:12', 1, '2024-07-25 11:11:29', 0),
(12, 6, 2, 'G20 Bali Global Blended Finance Alliance (GBFA): A Breakthrough of Multi-Stakeholder Financing for Development', NULL, '', NULL, '<p style=\"text-align:justify\">Financing for development requires whole economies and societies to pull together for the greater good. ln many countries, the smart use of public resources to increase private investment is a priority for development, because an active, responsible, and inclusive private sector investment is an essential provider of groMh. ln this context, private investments through blended flnance is the strategic use for the mobilization of additional private finance. The most significant value of blended finance transactions is the ability to unlock funding for investments in areas that are not well funded. These investment segments are typically seen as &#39;too risky&#39; for low risk seeking investors, or returns are not commensurate with risk for risk-seeking investors.</p>\r\n\r\n<p style=\"text-align:justify\">Nevertheless, the lack of an accessible intermediation platform for sustainability projects makes it hard for private financiers to participate in blended financing. Accordingly, enhancing and opening up channels where private investors can easily interact with concessional capital providers can facilitate a greater flow of capital toward the development sector. Thus, to maximize the potential for utilizing blended finance, at the G20 Bali 2022, the formation of the G20 Bali Global Blended Finance Alliance (GBFA) was initiated and is expected to become a breakthrough of multistakeholder financing for development. lndonesia has then taken a lead in its development through the establishment of the G20 Bali GBFA Secretariat in May 2024 which was followed by the signing of Letters of lntent from various countries in Bali.</p>\r\n\r\n<p style=\"text-align:justify\">G20 Bali GBFA is expected to implement the &quot;G20 Principles to Scale up Blended Finance in Developing Countries, including Leasf Developed Countries and Small lsland Developing Sfafes&quot;, through its role as a platform for knowledge sharing, role of matchmaking information related to demand and supply of blended finance projects at the global level and as a platform for project preparation or providing support to the market to be able to propose bankable projects. Apart from that, there are several characteristics of G20 Bali GBFA that need to be implemented, including bringing an international perspective and placing it as a solution to problems on an international scale, following the market dynamics and interests / appetites (both in terms of schemes, project pipelines, meeting bankability standards) in order that the activities carried out can be relevant and impactful and the latest, accommodating the needs of the private sector and the perspective of the philanthropic sector.</p>\r\n\r\n<p style=\"text-align:justify\">Thus, in order to delve into the role of blended finance as a multi-stakeholder financing model, this seminar was held. The discussion will bring together relevant practitioners of blended finance from governments, global development institutions, and private sectors to share their insight, best practices, and expertise on blended finance policy and implementation and gain input for the development of G20 Bali Global Blended Finance Alliance (GBFA).</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'G20-Bali-Global-Blended-Finance-Alliance-GBFA-A-Breakthrough-of-Multi-Stakeholder-Financing-for-Development', 100, NULL, NULL, '2024-09-03 13:30:00', '2024-09-03 15:00:00', 1, '2024-07-25 16:13:54', 1, '2024-07-25 11:12:05', 0),
(13, 6, 2, 'Empowering Micro, Small and Medium-sized Enterprises: Strengthening Micro-Financing for Inclusive and Impactful Development', NULL, '-14-,-12-,-13-', NULL, '<p style=\"text-align:justify\">As highlighted at Indonesia G20 Presidency 2022, strengthening and debottlenecking related to Micro, Small, and Medium-sized Enterprises (MSMEs) has become one of the priority issues. MSMEs, both formal and informal, make up over 90% of all firms around the globe. They are the backbone of most economies, particularly in developing countries, including LDCs and SIDS, and play the key role in achieving the SDGs. Thus, through &quot;G20 Roadmap for Stronger Recovery and Resilience in Developing Countries, including LDCs and SIDS&quot;, G20 DWG proposes a set of voluntary collective synergistic and gender responsive actions to further enhance the productivity, competitiveness, resilience, and access to finance and global value chain of MSMEs in developing countries, including LDCs and SIDS, as a key pathway to sustaining progress towards the SDGs.</p>\r\n\r\n<p style=\"text-align:justify\">Building on what has been discussed in 2022, this discussion would like to delve more into financing options. Limited access to bank loans hinders the growth of small businesses in developing countries. Unlike large corporations, SMEs often rely on personal savings or loans from friends and family to fund their initial operations and ongoing expenses. This lack of access to formal financing creates a significant obstacle. The International Finance Corporation estimates a staggering $5.2 trillion financing gap annually, impacting 40% (roughly 65 million) of formal micro, small, and medium-sized enterprises in developing nations. This gap is a staggering 1.4 times higher than the current global MSME lending volume. The burden of this financing gap isn&#39;t evenly distributed. East Asia and the Pacific region face the most significant challenge, accounting for nearly half (46%) of the global gap. Latin America and the Caribbean (23%) and Europe and Central Asia (15%) follow closely behind.</p>\r\n\r\n<p style=\"text-align:justify\">Interestingly, the gap&#39;s severity varies geographically. Latin America and the Caribbean and the Middle East and North Africa have the highest proportions of unmet demand relative to potential borrowers, at a concerning 87% and 88%, respectively. This translates to roughly half of all formal SMEs lacking access to traditional credit channels. The situation is even more dire when considering micro and informal enterprises, as highlighted by World Bank data.</p>\r\n\r\n<p style=\"text-align:justify\">In a world marked by widening gaps of inequality, micro-financing has emerged as a powerful tool for unlocking untapped potential. From rural villages to bustling urban centers, microloans and financial services are transforming lives and empowering communities often excluded from traditional banking systems. This seminar delves into the heart of micro-financing. We&#39;ll explore its crucial role in fostering inclusive development, examining strategies to maximize impact. The discussion will delve into the success stories of micro-financing as enablers of entrepreneurship in Micro, Small and Medium-sized Enterprises (MSMEs), particularly among marginalized groups, fueling economic growth from the ground up. MSMEs in the least developed countries (LDCs) other times face structural barriers for their growth, hampering the realization of their vast potential contribution to social and economic development of their countries, including the graduation from the LDC category, namely Access to finance, Regulatory Frameworks, and Technical Capacity. Succeeding in addressing these challenges will create a positive impact in developing countries as they provide 60-70% of formal employment. In sub-Saharan Africa alone, that figure rises to 80%. The scale and diversity of small business in the global economy makes it a potentially powerful force in development efforts. To harness this potential, it is important to strengthen the competitiveness of MSMEs and enhance their contribution to the 2030 Agenda for Sustainable Development.</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Empowering-Micro-Small-and-Medium-sized-Enterprises-Strengthening-Micro-Financing-for-Inclusive-and-Impactful-Development', 100, NULL, NULL, '2024-09-03 15:30:00', '2024-09-03 17:00:00', 1, '2024-07-26 11:53:14', 1, '2024-07-25 11:12:31', 0),
(14, 2, 1, 'Connecting the South: Enhancing Logistics Connectivity to Support Trade in Developing Countries', NULL, '-5-,-357-', NULL, '<p style=\"text-align:justify\">Maritime transport handles over 80% of global merchandise volume, making ports essential to global trade and economy. UNCTAD data on shipping capacity shows that developing economies actually hold the majority share of merchant vessels globally, with around 58,000 vessels (60.1%) compared to developed economies&#39; 31,000 vessels (32.1%) and Least Developed Countries (LDCs) 6,000 vessels (6.4%). However, a World Bank ranking reveals that developed economies dominate the top spots in logistics performance (Logistics Performance Index 2023). Most developing economies and LDCs fall below the 20th rank. Despite having a larger fleet, developing economies struggle to leverage their shipping capacity due to inadequate logistics infrastructure (including essential facilities like cold storage for perishable goods) and its supporting capacity such as tracking ability, shipment price competitiveness, and timeliness.</p>\r\n\r\n<p style=\"text-align:justify\">Technology has played a significant role in this progress, with the implementation of tracking systems and digital platforms helping to increase transparency and efficiency in logistics operations. Focused on reducing shipment prices and improving timeliness making goods more competitive in the global market. Trade also has direct consequences on climate change and the other way around since the environment has a significant role in forming trade patterns. According to OECD data, around 80% of global trade from maritime shipping could experience negative externalities, for example due to extreme weather and rising sea levels.</p>\r\n\r\n<p style=\"text-align:justify\">Optimizing development of robust and sustainable logistics infrastructure in developing countries will enable full utilization of existing shipping facilities, improve trade connectivity with other countries, and participate more effectively in the global economy.</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Connecting-the-South-Enhancing-Logistics-Connectivity-to-Support-Trade-in-Developing-Countries', 100, NULL, NULL, '2024-09-03 11:00:00', '2024-09-03 12:30:00', 1, '2024-08-02 16:38:16', 1, '2024-07-25 11:16:36', 0),
(26, 1, 1, 'High-Level Plenary Session “Building Bridges: Unlocking the Full Potential of Global South through Multi-Stakeholder Partnerships”			', NULL, '', NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'High-Level-Plenary-Session-Builzding-Bridges-Unlocking-the-Full-Potential-of-Global-South-through-Multi-Stakeholder-PartnershipsHigh-Level-Plenary-Session-Building-Bridges', 0, NULL, NULL, '2024-09-02 14:15:00', '2024-09-02 16:15:00', 1, '2024-07-25 14:54:02', 1, '2024-07-25 14:54:02', 1),
(3, 1, 1, 'High-Level Plenary Session “Building Bridges: Unlocking the Full Potential of Global South through Multi-Stakeholder Partnerships”', NULL, '-20-,-8-,-5-,-3-', NULL, '<p style=\"text-align:justify\">As the world is at the midpoint of implementing the 2030 Agenda, the Global South holds vast potential for determining the success of the sustainable future goals. The contribution of the Global South to world GDP has gained speed &mdash; from about 19% in 1990 to around 42% in 2024, and potentially will reach over 50% before the end of the decade. Citing 2022 data from UNCTAD, South-South trade accounts for an increasing share of global trade. It has risen from 17% in 2005 to 28% in 2021, experiencing a notable increase of approximately 50% from 2019. This pattern underscores the heightened involvement of South-South partnership. Increasing Global South role in international investment also shows where FDI from developing nations grew from around USD 110 billion in 2005 to $381 billion in 2017. Multinational companies based in emerging economies are playing an increasing role in foreign projects (UNCTAD, 2017). They have also become the centre of gravity for energy transition in the future, mindful of the increasingly concentrated population growth in developing countries (UNCTAD, 2022). They have become one of the main driving force of renewable energy as well. Developing countries offer exceptional renewable energy prospects, whereas India, Chile and China have the lowest solar energy costs in the world opening wider access to renewable energy for the rest of the world.</p>\r\n\r\n<p style=\"text-align:justify\">However, these potential facades come with persistent challenges, among many sustainable development challenges and vulnerabilities are volatile economic growth, an overreliance on commodity production and exports, weak productive capacities, lack of structural transformation, pervasive infrastructure deficits, insufficient domestic resource mobilization amidst limited financing for development, weak export competitiveness, continued vulnerability to economic, social and environmental shocks and disasters, gender inequality, growing youth unemployment, weak human capacities, rural&ndash;urban disparities and a need to strengthen developmental governance and capacities of the public and private sectors. The majority of developing countries are commodity dependent. Moreover, the global economy is increasingly burdened by systemic issues including divergent growth patterns, deepening inequalities, growing market concentration, and mounting debt burdens. Citing the United Nations, income inequality between countries has considerably improved in the last 25 years, accredited to strong economic growth in China and other emerging economies in Asia. However, the gap between countries is still apparent, for example the average income of people living in North America is 16 times higher than that of people in sub-Saharan Africa. The UN&#39;s SDGs Report 2023 has also noted that the Covid-19 has caused the largest increase between-country inequality in three decades according to World Bank estimates. Inequalities are arising in the realm of access to newer technologies, including online and mobile connectivity. The economic impact of the pandemic on a large part of the world was devastating, the external shocks included sharp contractions in real exports, lower export prices, and reduced remittances and tourism receipts.</p>\r\n\r\n<p style=\"text-align:justify\">Challenges to economic recovery are also exacerbated by disruption of global supply chains, re- and onshoring, and the rebound of stifling protectionist measures and the global erosion of trust in the global institutions. In the midst of decreasing global trust to multilateralism, the time is ripe to rethink the role of international organizations and global muti-stakeholder partnership the shape of international practices that ensure equitable growth across nations. As outlined in the Declaration on the Right to Development, carrying the primary responsibility for the creation of national and international conditions favourable to the realization of the right to developments well as co-operating in eliminating obstacles to development. This implies that collaboration should be at the heart of sustainable development goals achievement. This implies that collaboration should be at the heart of sustainable development goals achievement. The discussion will delve into multi stakeholder partnership solutions as a bridge builder, whether between North-South or South-South, to unlock the full potential of Global South.</p>\r\n', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'High-Level-Plenary-Session-Building-Bridges-Unlocking-the-Full-Potential-of-Global-South-through-Multi-Stakeholder-Partnerships', 100, NULL, NULL, '2024-09-02 14:15:00', '2024-09-02 16:00:00', 1, '2024-08-02 16:43:53', 999, '2024-07-10 06:53:38', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_calender_cat`
--

CREATE TABLE `kg_calender_cat` (
  `id` int(11) NOT NULL,
  `id_parents` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `title_eng` varchar(255) DEFAULT NULL,
  `is_publish` tinyint(4) NOT NULL DEFAULT 0,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_calender_cat`
--

INSERT INTO `kg_calender_cat` (`id`, `id_parents`, `title`, `title_eng`, `is_publish`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`, `is_delete`) VALUES
(1, 1, 'High Level Plenary', '#784500', 1, 0, NULL, 0, '2024-06-28 10:12:29', 0),
(2, 4, 'Thematic Session - SSTC', '#D20A2D', 1, 0, NULL, 0, '2024-06-28 10:12:29', 0),
(3, 2, 'Side Events', '#AAAAAA', 1, 0, NULL, 0, '2024-06-28 10:12:36', 0),
(4, 3, 'Special Event', '#edc232', 1, 0, NULL, 0, '2024-06-28 10:12:36', 0),
(5, 5, 'Thematic Session - Sustainable Economy', '#30c731', 1, 0, NULL, 0, '2024-06-28 10:12:29', 0),
(6, 6, 'Thematic Session - Innovative Financing', '#0F6EB9', 1, 0, NULL, 0, '2024-06-28 10:12:29', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_calender_lokasi`
--

CREATE TABLE `kg_calender_lokasi` (
  `id` int(11) NOT NULL,
  `id_parents` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `title_eng` varchar(255) DEFAULT NULL,
  `is_publish` tinyint(4) NOT NULL DEFAULT 0,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_calender_lokasi`
--

INSERT INTO `kg_calender_lokasi` (`id`, `id_parents`, `title`, `title_eng`, `is_publish`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`, `is_delete`) VALUES
(1, 0, 'Mangupura Hall, Bali International Convention Centre (BICC)', '#FFFF00', 1, 1, '2024-07-31 23:33:52', 0, '2024-06-28 10:12:29', 0),
(2, 0, 'Medan Room, Bali International Convention Centre (BICC)', '#00FF00', 1, 1, '2024-07-25 11:35:12', 0, '2024-06-28 10:12:29', 0),
(3, 0, 'Auditorium, Bali International Convention Centre (BICC)', '#0000FF', 1, 1, '2024-07-31 23:33:34', 0, '2024-06-28 10:12:36', 0),
(4, 0, 'The Mulia Hotel & Resort, Nusa Dua Bali', NULL, 1, 1, '2024-07-31 23:33:46', 999, '2024-07-13 16:33:24', 0),
(5, 0, 'Taman Bhagawan, Nusa Dua', NULL, 1, 1, '2024-07-31 23:33:28', 999, '2024-07-13 16:33:38', 0),
(6, 0, 'Bougenville Room', NULL, 1, 1, '2024-07-31 23:29:56', 999, '2024-07-13 16:34:16', 0),
(7, 0, 'Orchid Room', NULL, 1, 1, '2024-07-31 23:33:22', 999, '2024-07-13 16:34:25', 0),
(8, 0, 'Hibiscus Room', NULL, 1, 1, '2024-07-31 23:33:40', 999, '2024-07-13 16:34:34', 0),
(9, 0, 'Frangipani Room', NULL, 1, 999, '2024-07-13 16:34:44', 999, '2024-07-13 16:34:44', 0),
(10, 0, 'Bali Nusa Dua Convention Centre (BNDCC)', NULL, 1, 1, '2024-07-25 11:31:57', 1, '2024-07-25 11:16:06', 0),
(11, 0, 'InterContinental Bali Resort ', NULL, 1, 1, '2024-08-01 21:39:12', 1, '2024-08-01 21:39:12', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_config`
--

CREATE TABLE `kg_config` (
  `id` int(11) NOT NULL,
  `tabel` varchar(255) NOT NULL,
  `config` text NOT NULL,
  `to_detail` varchar(255) DEFAULT NULL,
  `is_multi_lang` tinyint(4) DEFAULT 0,
  `is_sort` tinyint(4) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_config_global`
--

CREATE TABLE `kg_config_global` (
  `id` tinyint(4) NOT NULL,
  `cms_name` varchar(255) NOT NULL DEFAULT 'CMS - Mazhters',
  `is_multi_lang` tinyint(1) NOT NULL DEFAULT 0,
  `file_size` varchar(255) NOT NULL DEFAULT '1024',
  `img_size` varchar(255) NOT NULL DEFAULT '200',
  `img_thumb_w` varchar(255) NOT NULL DEFAULT '100',
  `img_thumb_h` varchar(255) NOT NULL DEFAULT '100'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_config_language`
--

CREATE TABLE `kg_config_language` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `flag` varchar(255) NOT NULL,
  `is_active` enum('Active','InActive') NOT NULL DEFAULT 'Active',
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_contents`
--

CREATE TABLE `kg_contents` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_eng` varchar(255) DEFAULT NULL,
  `headline` text DEFAULT NULL,
  `headline_eng` text DEFAULT NULL,
  `contents` longtext NOT NULL,
  `contents_eng` longtext DEFAULT NULL,
  `file` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `file_mobile` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_desc` text DEFAULT NULL,
  `seo_title_eng` varchar(255) DEFAULT NULL,
  `seo_desc_eng` text DEFAULT NULL,
  `is_publish` tinyint(4) NOT NULL DEFAULT 1,
  `slug` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `warna` varchar(255) DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_contents`
--

INSERT INTO `kg_contents` (`id`, `title`, `title_eng`, `headline`, `headline_eng`, `contents`, `contents_eng`, `file`, `file_mobile`, `seo_title`, `seo_desc`, `seo_title_eng`, `seo_desc_eng`, `is_publish`, `slug`, `link`, `warna`, `publish_date`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`, `is_delete`) VALUES
(1, 'About HLF MSP 2024', NULL, 'The HLF MSP 2024 is an international forum that will convene various stakeholders (government/non-government) to discuss collaborative efforts aimed at achieving \'transformative changes\' in addressing global challenges, including development gap, through a \'multi-stakeholder partnerships\' approach. \r\n', NULL, '<p><strong>Why HLF MSP?</strong></p>\r\n\r\n<p style=\"text-align:justify\">Reflecting on current multidimensional global challenges, transformative measures and stronger international cooperation have become more critical than ever in advancing the 2030 Agenda for Sustainable Development. This cooperation should be effective, inclusive, and supported by multi-stakeholder partnerships (MSP).&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Transformative MSP is a pivotal instrument for addressing today&rsquo;s global challenges. It also echoes the need for inclusive and networked multilateralism, reinforcing trust among global stakeholders. Such transformative initiative also further cultivates the right to development, that brings the spirit of equality to partnerships among developing countries, which has been discussed as early as 1955, when Indonesia hosted the Asian-African Conference in Bandung.</p>\r\n\r\n<p style=\"text-align:justify\">The High-Level Forum on Multi-Stakeholder Partnerships will be opened by Joint Opening Session with Indonesia-Africa Forum II which concurrently will also be held in Bali and&nbsp;proceed to the High-Level Plenary Session on &quot;Building Bridges: Unlocking the Full Potential of Global South through Multi-Stakeholder Partnership&quot;&nbsp;followed by 12&nbsp;thematic parallel sessions&nbsp;as well as more than 16 special sessions and side events.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">The HLF MSP will convene prominent speakers and&nbsp;participants&nbsp;from&nbsp;various stakeholders, including&nbsp;Head of States, government officials, international organizations, MDBs, Private Sectors, CSOs, Philantrophy, Academicians/Think Tanks, etc.</p>\r\n<!--?php phpinfo()?-->', '<h2 style=\"text-align:center\">Main Theme</h2>\r\n\r\n<p style=\"text-align:center\"><strong><span style=\"font-size:26px\"><span style=\"color:#0f6eb9\">&quot;Strengthening Multi-Stakeholder Partnerships for Development: Towards A Transformative Change&quot;</span></span></strong></p>\r\n\r\n<hr />\r\n<h2 style=\"text-align:center\">Objective</h2>\r\n\r\n<p><span style=\"font-size:20px\">The primary objectives of the High-Level Forum are:</span></p>\r\n\r\n<div><span style=\"font-size:18px\"><span style=\"color:#ffffff\"><span style=\"background-color:#0f5096\">1. To encourage policy dialogues and enhance commitment and collaboration in global development through MSP, including to ensure the sustainability of development financing;</span></span></span></div>\r\n\r\n<div><span style=\"font-size:18px\"><span style=\"color:#ffffff\"><span style=\"background-color:#0f5096\">2. To highlight success factors, best practices and lessons learned from the implementation of MSP in various countries in enhancing effectiveness and inclusivity in development cooperation to accelerate the achievement of the SDGs;</span></span></span></div>\r\n\r\n<div><span style=\"font-size:18px\"><span style=\"color:#ffffff\"><span style=\"background-color:#0f5096\">3. To catalyse collective actions and recommendations for MSP that promote transformative changes, particularly among developing&nbsp;countries.</span></span></span></div>\r\n\r\n<hr />\r\n<h2 style=\"text-align:center\">Sub Theme</h2>\r\n\r\n<div><strong><span style=\"font-size:20px\"><span style=\"background-color:#b90013; color:#ffffff\">1. &ldquo;Advancing Development Through Innovative Financing</span></span></strong></div>\r\n\r\n<div><strong><span style=\"font-size:20px\"><span style=\"background-color:#b90013; color:#ffffff\">2. &ldquo;Enchancing Welfare and Sustainability Through Sustainble Economy&rdquo;</span></span></strong></div>\r\n\r\n<div><strong><span style=\"font-size:20px\"><span style=\"background-color:#b90013; color:#ffffff\">3. &ldquo;Multi-Stakeholder Partnership for Strengthening South-South and Triangular Cooperation&rdquo;</span></span></strong></div>\r\n', '20240725112807.LOGO HLF MSP HORIZONTAL.png', NULL, NULL, NULL, NULL, NULL, 1, 'About-HLF-MSP-2024', NULL, NULL, NULL, 1, '2024-07-31 23:52:01', 0, '2024-06-28 07:51:58', 0),
(2, 'Parallel Thematic Session', NULL, 'HLF MSP 2024\'s Forum', NULL, '<p>Under the theme of &ldquo;Strengthening Multi-Stakeholder Partnerships for Development: Towards A Transformative Change&rdquo;, the HLF MSP 2024 aims to facilitate dialogues, bridge collaborations, and accelerate collective action by serving as a middle ground in paving the way towards transformative changes through a multi-stakeholder approach. &nbsp;</p>\n\n<p>The HLF MSP 2024 will bring together Head of States/Government, International Organizations, Multilateral Development Banks, Civil Society Organizations, Private Sectors, Philanthropy Organizations, and Think-Tanks. The discussions will be explored through a variety of sessions including leaders&rsquo; session, high-level plenary session, 12 parallel thematic sessions, as well as more than 16 special sessions and side events. &nbsp;</p>\n\n<p>The parallel sessions will focus on three thematic area, which are: Advancing Development through Innovative Financing; Enhancing Welfare and Sustainability through Sustainable Economy; and Multi-Stakeholder Partnerships for Strengthening South-South and Triangular Cooperation.&nbsp;</p>\n\n<p>Click&nbsp;&quot;Event Agenda&quot; for more details agenda on each forums, time and place allocation, speakers and&nbsp;focus discussion, and many more.</p>\n', NULL, '', NULL, NULL, NULL, NULL, NULL, 1, 'Forum', NULL, NULL, NULL, 1, '2024-07-11 12:35:42', 0, '2024-06-28 10:10:29', 0),
(3, 'Special Event', NULL, 'HLF MSP 2024\'s Non Forum', NULL, '<p style=\"text-align:justify\">We cordially invite you to a multi-faceted extravaganza, designed to foster connections, celebrate culture, and ignite new possibilities through our non&nbsp;forum event in HLF MSP 2024. Those event ranging&nbsp;from Welcoming&nbsp;Dinner for Heads of States hosted by the President of the Republic of Indonesia,&nbsp;Cultural Event and Reception for All Delegates hosted by The Minister of National Development Planning&nbsp;the Republic of Indonesia and&nbsp;Exhibition featuring interesting and various booth from various tenants.</p>\r\n\r\n<p style=\"text-align:justify\"><strong><span style=\"background-color:#dddddd\">1. Welcoming&nbsp;Dinner for Heads of States hosted by the President of the Republic of Indonesia</span></strong></p>\r\n\r\n<p style=\"text-align:justify\">The evening commences with a Welcoming&nbsp;Dinner exclusively for heads of state. This prestigious event promises a captivating performances and&nbsp;an exquisite culinary journey alongside stimulating conversation with esteemed dignitaries. It will be held in the Imperial Grand Ballroom of The Jimbaran Convention Center, one of the most renowned and enduring beachfront resorts built on the beautiful shores of Jimbaran Bay, overlooking the picturesque sunsets. The Welcoming&nbsp;Dinner is designated for Head of States.</p>\r\n\r\n<p style=\"text-align:justify\"><strong><span style=\"background-color:#dddddd\">2. Cultural Event and Reception for All Delegates hosted by The Minister of National Development Planning&nbsp;the Republic of Indonesia</span></strong></p>\r\n\r\n<p style=\"text-align:justify\">A captivating cultural event will take center stage on day 2 for all delegates.&nbsp;This semi-formal affair will showcase the rich heritage and diversity of Indonesia through a captivating array of artistic performances and entertaining acts hold in Taman Bhagawan, Bali. Also, embark on a culinary journey and&nbsp;savor the delectable flavors of traditional cuisine from various regions across the archipelago. Each dish is a testament to the culinary artistry and unique flavors that define Indonesia&#39;s gastronomic heritage. This cultural event also&nbsp;provides the perfect platform to exchange ideas and cultivate lasting connection, mingle with fellow participants, forge new relationships, and engage in stimulating dialogue.&nbsp;Join us for an unforgettable evening of cultural immersion, culinary delight, and celebration. The Cultural Night is a must-attend event for anyone seeking to experience the true essence of Indonesia.</p>\r\n\r\n<p style=\"text-align:justify\"><strong><span style=\"background-color:#dddddd\">3. Booth Exhibition</span></strong></p>\r\n\r\n<p style=\"text-align:justify\">Complementing these events is a dynamic exhibition showcasing a diverse array of booths from our esteemed tenants. Explore a kaleidoscope of offerings, each booth brimming with unique products, services, and experiences. This is your chance to discover hidden gems and forge valuable business partnerships.</p>\r\n\r\n<p style=\"text-align:justify\">This extraordinary soiree presents a unique opportunity to network with key decision-makers, celebrate cultural heritage, and explore a world of possibilities. Don&#39;t miss out on this unforgettable experience!</p>\r\n', NULL, '', NULL, NULL, NULL, NULL, NULL, 1, 'Special-Event', NULL, NULL, NULL, 1, '2024-08-02 15:55:39', 0, '2024-07-09 05:51:03', 0),
(4, 'Side Event', NULL, '16 Various Side Events', NULL, '<h1 style=\"text-align:center\"><span style=\"color:#c0392b\"><strong><span style=\"background-color:#ecf0f1\">16 Various Side Events</span></strong></span></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:18px\">Whil<span style=\"font-family:Arial,Helvetica,sans-serif\">e the main parallel thematic sessions focuses on core themes, HL<span style=\"color:black\">F MSP also provided&nbsp;</span>16 concurrent side events that will be host by various stakeholders.&nbsp;There will be&nbsp;16 engaging side events alongside parallel thematic sessions. These events offer a unique platform for various stakeholders to participate and share their insights on a wide range of topics.&nbsp;These events also provide an opportunity to delve deeper into specific topics and connect with like-minded individuals.</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">The primary objectives of the side events are:</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">1. To discuss the challenges of multi-stakeholder partnership&rsquo;s status quo in any relevant thematic issues of HLF MSP 2024</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">2. To showcase success stories, lessons learnt, and best practices of multi-stakeholder partnerships</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">3. To facilitate a larger scale of Global South cooperation with meaningful participation of all relevant development actors</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Don&#39;t miss out on this chance to be part of the conversation</span></span></p>\r\n', NULL, '', NULL, NULL, NULL, NULL, NULL, 1, 'Side-Event', NULL, NULL, NULL, 1, '2024-07-25 16:09:10', 0, '2024-07-25 14:01:16', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_country`
--

CREATE TABLE `kg_country` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `create_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_country`
--

INSERT INTO `kg_country` (`id`, `title`, `modify_date`, `modify_user_id`, `create_date`, `create_user_id`) VALUES
(2, 'Aland Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'Albania', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 'Algeria', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 'American Samoa', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'Andorra', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 'Angola', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'Anguilla', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 'Antarctica', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 'Antigua and Barbuda', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 'Argentina', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 'Armenia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 'Aruba', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 'Australia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 'Austria', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 'Azerbaijan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 'Bahamas', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 'Bahrain', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, 'Bangladesh', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 'Barbados', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, 'Belarus', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 'Belgium', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 'Belize', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 'Benin', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 'Bermuda', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 'Bhutan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 'Bolivia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 'Bosnia and Herzegovina', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 'Botswana', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 'Bouvet Island', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, 'Brazil', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, 'British Indian Ocean Territory', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, 'British Virgin Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, 'Brunei', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, 'Bulgaria', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, 'Burkina Faso', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, 'Burundi', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 'Cambodia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, 'Cameroon', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, 'Canada', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, 'Cape Verde', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, 'Cayman Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, 'Central African Republic', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, 'Chad', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, 'Chile', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, 'China', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, 'Christmas Island', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, 'Cocos (Keeling) Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, 'Colombia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, 'Comoros', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, 'Congo', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, 'Cook Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, 'Costa Rica', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, 'Croatia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, 'Cuba', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, 'Cyprus', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, 'Czech Republic', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, 'Democratic Republic of Congo', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, 'Denmark', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, 'Disputed Territory', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, 'Djibouti', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, 'Dominica', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, 'Dominican Republic', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, 'East Timor', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, 'Ecuador', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, 'Egypt', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, 'El Salvador', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, 'Equatorial Guinea', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, 'Eritrea', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, 'Estonia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, 'Ethiopia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, 'Falkland Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, 'Faroe Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(74, 'Federated States of Micronesia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, 'Fiji', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, 'Finland', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(77, 'France', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, 'French Guyana', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, 'French Polynesia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(80, 'French Southern Territories', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(81, 'Gabon', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(82, 'Gambia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(83, 'Georgia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(84, 'Germany', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(85, 'Ghana', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(86, 'Gibraltar', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(87, 'Greece', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(88, 'Greenland', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(89, 'Grenada', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(90, 'Guadeloupe', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(91, 'Guam', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(92, 'Guatemala', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(93, 'Guinea', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(94, 'Guinea-Bissau', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(95, 'Guyana', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(96, 'Haiti', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(97, 'Heard Island and Mcdonald Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(98, 'Honduras', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(99, 'Hong Kong', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(100, 'Hungary', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(101, 'Iceland', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(102, 'India', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(103, 'Indonesia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(104, 'Iran', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(105, 'Iraq', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(106, 'Iraq-Saudi Arabia Neutral Zone', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(107, 'Ireland', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(109, 'Italy', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(110, 'Ivory Coast', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(111, 'Jamaica', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(112, 'Japan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(113, 'Jordan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(114, 'Kazakhstan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(115, 'Kenya', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(116, 'Kiribati', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(117, 'Kuwait', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(118, 'Kyrgyzstan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(119, 'Laos', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(120, 'Latvia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(121, 'Lebanon', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(122, 'Lesotho', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(123, 'Liberia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(124, 'Libya', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(125, 'Liechtenstein', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(126, 'Lithuania', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(127, 'Luxembourg', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(128, 'Macau', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(129, 'Macedonia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(130, 'Madagascar', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(131, 'Malawi', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(132, 'Malaysia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(133, 'Maldives', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(134, 'Mali', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(135, 'Malta', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(136, 'Marshall Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(137, 'Martinique', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(138, 'Mauritania', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(139, 'Mauritius', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(140, 'Mayotte', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(141, 'Mexico', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(142, 'Moldova', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(143, 'Monaco', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(144, 'Mongolia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(145, 'Montserrat', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(146, 'Morocco', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(147, 'Mozambique', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(149, 'Namibia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(150, 'Nauru', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(151, 'Nepal', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(152, 'Netherlands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(153, 'Netherlands Antilles', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(154, 'New Caledonia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(155, 'New Zealand', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(156, 'Nicaragua', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(157, 'Niger', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(158, 'Nigeria', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(159, 'Niue', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(160, 'Norfolk Island', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(161, 'North Korea', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(162, 'Northern Mariana Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(163, 'Norway', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(164, 'Oman', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(165, 'Pakistan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(166, 'Palau', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(167, 'Palestinian Occupied Territories', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(168, 'Panama', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(169, 'Papua New Guinea', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(170, 'Paraguay', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(171, 'Peru', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(172, 'Philippines', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(173, 'Pitcairn Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(174, 'Poland', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(175, 'Portugal', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(176, 'Puerto Rico', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(177, 'Qatar', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(178, 'Reunion', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(179, 'Romania', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(180, 'Russia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(181, 'Rwanda', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(182, 'Saint Helena and Dependencies', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(183, 'Saint Kitts and Nevis', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(184, 'Saint Lucia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(185, 'Saint Pierre and Miquelon', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(186, 'Saint Vincent and the Grenadines', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(187, 'Samoa', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(188, 'San Marino', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(189, 'Sao Tome and Principe', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(190, 'Saudi Arabia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(191, 'Senegal', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(192, 'Serbia and Montenegro', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(193, 'Seychelles', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(194, 'Sierra Leone', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(195, 'Singapore', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(196, 'Slovakia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(197, 'Slovenia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(198, 'Solomon Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(199, 'Somalia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(200, 'South Africa', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(201, 'South Georgia and South Sandwich Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(202, 'South Korea', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(203, 'Spain', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(204, 'Spratly Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(205, 'Sri Lanka', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(206, 'Sudan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(207, 'Suriname', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(208, 'Svalbard and Jan Mayen', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(209, 'Swaziland', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(210, 'Sweden', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(211, 'Switzerland', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(212, 'Syria', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(213, 'Taiwan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(214, 'Tajikistan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(215, 'Tanzania', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(216, 'Thailand', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(217, 'Togo', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(218, 'Tokelau', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(219, 'Tonga', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(220, 'Trinidad and Tobago', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(221, 'Tunisia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(222, 'Turkey', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(223, 'Turkmenistan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(224, 'Turks And Caicos Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(225, 'Tuvalu', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(226, 'Uganda', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(227, 'Ukraine', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(228, 'United Arab Emirates', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(229, 'United Kingdom', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(230, 'United Nations Neutral Zone', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(231, 'United States', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(232, 'United States Minor Outlying Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(233, 'Uruguay', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(234, 'US Virgin Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(235, 'Uzbekistan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(236, 'Vanuatu', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(237, 'Vatican City', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(238, 'Venezuela', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(239, 'Vietnam', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(240, 'Wallis and Futuna', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(241, 'Western Sahara', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(242, 'Yemen', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(243, 'Zambia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(244, 'Zimbabwe', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_countrycode`
--

CREATE TABLE `kg_countrycode` (
  `id` int(11) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `iso` varchar(255) DEFAULT NULL,
  `population` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `gdp` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kg_countrycode`
--

INSERT INTO `kg_countrycode` (`id`, `country`, `code`, `iso`, `population`, `area`, `gdp`) VALUES
(2, 'Albania', '355', 'AL / ALB', '2,986,952', '28,748', '12.8 Billion'),
(3, 'Algeria', '213', 'DZ / DZA', '34,586,184', '2,381,740', '215.7 Billion'),
(4, 'American Samoa', '1-684', 'AS / ASM', '57,881', '199', '462.2 Million'),
(5, 'Andorra', '376', 'AD / AND', '84', '468', '4.8 Billion'),
(6, 'Angola', '244', 'AO / AGO', '13,068,161', '1,246,700', '124 Billion'),
(7, 'Anguilla', '1-264', 'AI / AIA', '13,254', '102', '175.4 Million'),
(8, 'Antarctica', '672', 'AQ / ATA', '0', '14,000,000', ''),
(9, 'Antigua and Barbuda', '1-268', 'AG / ATG', '86,754', '443', '1.22 Billion'),
(10, 'Argentina', '54', 'AR / ARG', '41,343,201', '2,766,890', '484.6 Billion'),
(11, 'Armenia', '374', 'AM / ARM', '2,968,000', '29,8', '10.44 Billion'),
(12, 'Aruba', '297', 'AW / ABW', '71,566', '193', '2.516 Billion'),
(13, 'Australia', '61', 'AU / AUS', '21,515,754', '7,686,850', '1.488 Trillion'),
(14, 'Austria', '43', 'AT / AUT', '8,205,000', '83,858', '417.9 Billion'),
(15, 'Azerbaijan', '994', 'AZ / AZE', '8,303,512', '86,6', '76.01 Billion'),
(16, 'Bahamas', '1-242', 'BS / BHS', '301,79', '13,94', '8.373 Billion'),
(17, 'Bahrain', '973', 'BH / BHR', '738,004', '665', '28.36 Billion'),
(18, 'Bangladesh', '880', 'BD / BGD', '156,118,464', '144', '140.2 Billion'),
(19, 'Barbados', '1-246', 'BB / BRB', '285,653', '431', '4.262 Billion'),
(20, 'Belarus', '375', 'BY / BLR', '9,685,000', '207,6', '69.24 Billion'),
(21, 'Belgium', '32', 'BE / BEL', '10,403,000', '30,51', '507.4 Billion'),
(22, 'Belize', '501', 'BZ / BLZ', '314,522', '22,966', '1.637 Billion'),
(23, 'Benin', '229', 'BJ / BEN', '9,056,010', '112,62', '8.359 Billion'),
(24, 'Bermuda', '1-441', 'BM / BMU', '65,365', '53', '5.6 Billion'),
(25, 'Bhutan', '975', 'BT / BTN', '699,847', '47', '2.133 Billion'),
(26, 'Bolivia', '591', 'BO / BOL', '9,947,418', '1,098,580', '30.79 Billion'),
(27, 'Bosnia and Herzegovina', '387', 'BA / BIH', '4,590,000', '51,129', '18.87 Billion'),
(28, 'Botswana', '267', 'BW / BWA', '2,029,307', '600,37', '15.53 Billion'),
(29, 'Brazil', '55', 'BR / BRA', '201,103,330', '8,511,965', '2.19 Trillion'),
(30, 'British Indian Ocean Territory', '246', 'IO / IOT', '4', '60', ''),
(31, 'British Virgin Islands', '1-284', 'VG / VGB', '21,73', '153', '1.095 Billion'),
(32, 'Brunei', '673', 'BN / BRN', '395,027', '5,77', '16.56 Billion'),
(33, 'Bulgaria', '359', 'BG / BGR', '7,148,785', '110,91', '53.7 Billion'),
(34, 'Burkina Faso', '226', 'BF / BFA', '16,241,811', '274,2', '12.13 Billion'),
(35, 'Burundi', '257', 'BI / BDI', '9,863,117', '27,83', '2.676 Billion'),
(36, 'Cambodia', '855', 'KH / KHM', '14,453,680', '181,04', '15.64 Billion'),
(37, 'Cameroon', '237', 'CM / CMR', '19,294,149', '475,44', '27.88 Billion'),
(38, 'Canada', '1', 'CA / CAN', '33,679,000', '9,984,670', '1.825 Trillion'),
(39, 'Cape Verde', '238', 'CV / CPV', '508,659', '4,033', '1.955 Billion'),
(40, 'Cayman Islands', '1-345', 'KY / CYM', '44,27', '262', '2.25 Billion'),
(41, 'Central African Republic', '236', 'CF / CAF', '4,844,927', '622,984', '2.05 Billion'),
(42, 'Chad', '235', 'TD / TCD', '10,543,464', '1,284,000', '13.59 Billion'),
(43, 'Chile', '56', 'CL / CHL', '16,746,491', '756,95', '281.7 Billion'),
(44, 'China', '86', 'CN / CHN', '1,330,044,000', '9,596,960', '9.33 Trillion'),
(45, 'Christmas Island', '61', 'CX / CXR', '1,5', '135', ''),
(46, 'Cocos Islands', '61', 'CC / CCK', '628', '14', ''),
(47, 'Colombia', '57', 'CO / COL', '47,790,000', '1,138,910', '369.2 Billion'),
(48, 'Comoros', '269', 'KM / COM', '773,407', '2,17', '658 Million'),
(49, 'Cook Islands', '682', 'CK / COK', '21,388', '240', '183.2 Million'),
(50, 'Costa Rica', '506', 'CR / CRI', '4,516,220', '51,1', '48.51 Billion'),
(51, 'Croatia', '385', 'HR / HRV', '4,491,000', '56,542', '59.14 Billion'),
(52, 'Cuba', '53', 'CU / CUB', '11,423,000', '110,86', '72.3 Billion'),
(53, 'Curacao', '599', 'CW / CUW', '141,766', '444', '5.6 Billion'),
(54, 'Cyprus', '357', 'CY / CYP', '1,102,677', '9,25', '21.78 Billion'),
(55, 'Czech Republic', '420', 'CZ / CZE', '10,476,000', '78,866', '194.8 Billion'),
(56, 'Democratic Republic of the Congo', '243', 'CD / COD', '70,916,439', '2,345,410', '18.56 Billion'),
(57, 'Denmark', '45', 'DK / DNK', '5,484,000', '43,094', '324.3 Billion'),
(58, 'Djibouti', '253', 'DJ / DJI', '740,528', '23', '1.459 Billion'),
(59, 'Dominica', '1-767', 'DM / DMA', '72,813', '754', '495 Million'),
(60, 'Dominica', '1-767', 'DM / DMA', '72,813', '754', '495 Million'),
(61, 'Dominican Republic', '1-809', 'DO / DOM', '9,823,821', '48,73', '59.27 Billion'),
(62, 'Dominican Republic', '1-829', '', '', '', ''),
(63, 'East Timor', '670', 'TL / TLS', '1,154,625', '15,007', '6.129 Billion'),
(64, 'Ecuador', '593', 'EC / ECU', '14,790,608', '283,56', '91.41 Billion'),
(65, 'Egypt', '20', 'EG / EGY', '80,471,869', '1,001,450', '262 Billion'),
(66, 'El Salvador', '503', 'SV / SLV', '6,052,064', '21,04', '24.67 Billion'),
(67, 'Equatorial Guinea', '240', 'GQ / GNQ', '1,014,999', '28,051', '17.08 Billion'),
(68, 'Eritrea', '291', 'ER / ERI', '5,792,984', '121,32', '3.438 Billion'),
(69, 'Estonia', '372', 'EE / EST', '1,291,170', '45,226', '24.28 Billion'),
(70, 'Ethiopia', '251', 'ET / ETH', '88,013,491', '1,127,127', '47.34 Billion'),
(71, 'Falkland Islands', '500', 'FK / FLK', '2,638', '12,173', '164.5 Million'),
(72, 'Faroe Islands', '298', 'FO / FRO', '48,228', '1,399', '2.32 Billion'),
(73, 'Fiji', '679', 'FJ / FJI', '875,983', '18,27', '4.218 Billion'),
(74, 'Finland', '358', 'FI / FIN', '5,244,000', '337,03', '259.6 Billion'),
(75, 'France', '33', 'FR / FRA', '64,768,389', '547,03', '2.739 Trillion'),
(76, 'French Polynesia', '689', 'PF / PYF', '270,485', '4,167', '5.65 Billion'),
(77, 'Gabon', '241', 'GA / GAB', '1,545,255', '267,667', '19.97 Billion'),
(78, 'Gambia', '220', 'GM / GMB', '1,593,256', '11,3', '896 Million'),
(79, 'Georgia', '995', 'GE / GEO', '4,630,000', '69,7', '15.95 Billion'),
(80, 'Germany', '49', 'DE / DEU', '81,802,257', '357,021', '3.593 Trillion'),
(81, 'Ghana', '233', 'GH / GHA', '24,339,838', '239,46', '45.55 Billion'),
(82, 'Gibraltar', '350', 'GI / GIB', '27,884', '7', '1.106 Billion'),
(83, 'Greece', '30', 'GR / GRC', '11,000,000', '131,94', '243.3 Billion'),
(84, 'Greenland', '299', 'GL / GRL', '56,375', '2,166,086', '2.16 Billion'),
(85, 'Grenada', '1-473', 'GD / GRD', '107,818', '344', '811 Million'),
(86, 'Guam', '1-671', 'GU / GUM', '159,358', '549', '4.6 Billion'),
(87, 'Guatemala', '502', 'GT / GTM', '13,550,440', '108,89', '53.9 Billion'),
(88, 'Guernsey', '44-1481', 'GG / GGY', '65,228', '78', '2.742 Billion'),
(89, 'Guinea', '224', 'GN / GIN', '10,324,025', '245,857', '6.544 Billion'),
(90, 'Guinea-Bissau', '245', 'GW / GNB', '1,565,126', '36,12', '880 Million'),
(91, 'Guyana', '592', 'GY / GUY', '748,486', '214,97', '3.02 Billion'),
(92, 'Haiti', '509', 'HT / HTI', '9,648,924', '27,75', '8.287 Billion'),
(93, 'Honduras', '504', 'HN / HND', '7,989,415', '112,09', '18.88 Billion'),
(94, 'Hong Kong', '852', 'HK / HKG', '6,898,686', '1,092', '272.1 Billion'),
(95, 'Hungary', '36', 'HU / HUN', '9,982,000', '93,03', '130.6 Billion'),
(96, 'Iceland', '354', 'IS / ISL', '308,91', '103', '14.59 Billion'),
(97, 'India', '91', 'IN / IND', '1,173,108,018', '3,287,590', '1.67 Trillion'),
(98, 'Indonesia', '62', 'ID / IDN', '242,968,342', '1,919,440', '867.5 Billion'),
(99, 'Iran', '98', 'IR / IRN', '76,923,300', '1,648,000', '411.9 Billion'),
(100, 'Iraq', '964', 'IQ / IRQ', '29,671,605', '437,072', '221.8 Billion'),
(101, 'Ireland', '353', 'IE / IRL', '4,622,917', '70,28', '220.9 Billion'),
(102, 'Isle of Man', '44-1624', 'IM / IMN', '75,049', '572', '4.076 Billion'),
(104, 'Italy', '39', 'IT / ITA', '60,340,328', '301,23', '2.068 Trillion'),
(105, 'Ivory Coast', '225', 'CI / CIV', '21,058,798', '322,46', '28.28 Billion'),
(106, 'Jamaica', '1-876', 'JM / JAM', '2,847,232', '10,991', '14.39 Billion'),
(107, 'Japan', '81', 'JP / JPN', '127,288,000', '377,835', '5.007 Trillion'),
(108, 'Jersey', '44-1534', 'JE / JEY', '90,812', '116', '5.1 Billion'),
(109, 'Jordan', '962', 'JO / JOR', '6,407,085', '92,3', '34.08 Billion'),
(110, 'Kazakhstan', '7', 'KZ / KAZ', '15,340,000', '2,717,300', '224.9 Billion'),
(111, 'Kenya', '254', 'KE / KEN', '40,046,566', '582,65', '45.31 Billion'),
(112, 'Kiribati', '686', 'KI / KIR', '92,533', '811', '173 Million'),
(113, 'Kosovo', '383', 'XK / XKX', '1,800,000', '10,887', '7.15 Billion'),
(114, 'Kuwait', '965', 'KW / KWT', '2,789,132', '17,82', '179.5 Billion'),
(115, 'Kyrgyzstan', '996', 'KG / KGZ', '5,508,626', '198,5', '7.234 Billion'),
(116, 'Laos', '856', 'LA / LAO', '6,368,162', '236,8', '10.1 Billion'),
(117, 'Latvia', '371', 'LV / LVA', '2,217,969', '64,589', '30.38 Billion'),
(118, 'Lebanon', '961', 'LB / LBN', '4,125,247', '10,4', '43.49 Billion'),
(119, 'Lesotho', '266', 'LS / LSO', '1,919,552', '30,355', '2.457 Billion'),
(120, 'Liberia', '231', 'LR / LBR', '3,685,076', '111,37', '1.977 Billion'),
(121, 'Libya', '218', 'LY / LBY', '6,461,454', '1,759,540', '70.92 Billion'),
(122, 'Liechtenstein', '423', 'LI / LIE', '35', '160', '5.113 Billion'),
(123, 'Lithuania', '370', 'LT / LTU', '2,944,459', '65,2', '46.71 Billion'),
(124, 'Luxembourg', '352', 'LU / LUX', '497,538', '2,586', '60.54 Billion'),
(125, 'Macao', '853', 'MO / MAC', '449,198', '254', '51.68 Billion'),
(126, 'Macedonia', '389', 'MK / MKD', '2,062,294', '25,333', '10.65 Billion'),
(127, 'Madagascar', '261', 'MG / MDG', '21,281,844', '587,04', '10.53 Billion'),
(128, 'Malawi', '265', 'MW / MWI', '15,447,500', '118,48', '3.683 Billion'),
(129, 'Malaysia', '60', 'MY / MYS', '28,274,729', '329,75', '312.4 Billion'),
(130, 'Maldives', '960', 'MV / MDV', '395,65', '300', '2.27 Billion'),
(131, 'Mali', '223', 'ML / MLI', '13,796,354', '1,240,000', '11.37 Billion'),
(132, 'Malta', '356', 'MT / MLT', '403', '316', '9.541 Billion'),
(133, 'Marshall Islands', '692', 'MH / MHL', '65,859', '181', '193 Million'),
(134, 'Mauritania', '222', 'MR / MRT', '3,205,060', '1,030,700', '4.183 Billion'),
(135, 'Mauritius', '230', 'MU / MUS', '1,294,104', '2,04', '11.9 Billion'),
(136, 'Mayotte', '262', 'YT / MYT', '159,042', '374', ''),
(137, 'Mexico', '52', 'MX / MEX', '112,468,855', '1,972,550', '1.327 Trillion'),
(138, 'Micronesia', '691', 'FM / FSM', '107,708', '702', '339 Million'),
(139, 'Moldova', '373', 'MD / MDA', '4,324,000', '33,843', '7.932 Billion'),
(140, 'Monaco', '377', 'MC / MCO', '32,965', '2', '5.748 Billion'),
(141, 'Mongolia', '976', 'MN / MNG', '3,086,918', '1,565,000', '11.14 Billion'),
(142, 'Montenegro', '382', 'ME / MNE', '666,73', '14,026', '4.518 Billion'),
(143, 'Montserrat', '1-664', 'MS / MSR', '9,341', '102', ''),
(144, 'Morocco', '212', 'MA / MAR', '31,627,428', '446,55', '104.8 Billion'),
(145, 'Mozambique', '258', 'MZ / MOZ', '22,061,451', '801,59', '14.67 Billion'),
(147, 'Namibia', '264', 'NA / NAM', '2,128,471', '825,418', '12.3 Billion'),
(148, 'Nauru', '674', 'NR / NRU', '10,065', '21', ''),
(149, 'Nepal', '977', 'NP / NPL', '28,951,852', '140,8', '19.34 Billion'),
(150, 'Netherlands', '31', 'NL / NLD', '16,645,000', '41,526', '722.3 Billion'),
(151, 'Netherlands Antilles', '599', 'AN / ANT', '136,197', '960', ''),
(152, 'New Caledonia', '687', 'NC / NCL', '216,494', '19,06', '9.28 Billion'),
(153, 'New Zealand', '64', 'NZ / NZL', '4,252,277', '268,68', '181.1 Billion'),
(154, 'Nicaragua', '505', 'NI / NIC', '5,995,928', '129,494', '11.26 Billion'),
(155, 'Niger', '227', 'NE / NER', '15,878,271', '1,267,000', '7.304 Billion'),
(156, 'Nigeria', '234', 'NG / NGA', '154,000,000', '923,768', '502 Billion'),
(157, 'Niue', '683', 'NU / NIU', '2,166', '260', '10.01 Million'),
(158, 'North Korea', '850', 'KP / PRK', '22,912,177', '120,54', '28 Billion'),
(159, 'Northern Mariana Islands', '1-670', 'MP / MNP', '53,883', '477', '733 Million'),
(160, 'Norway', '47', 'NO / NOR', '5,009,150', '324,22', '515.8 Billion'),
(161, 'Oman', '968', 'OM / OMN', '2,967,717', '212,46', '81.95 Billion'),
(162, 'Pakistan', '92', 'PK / PAK', '184,404,791', '803,94', '236.5 Billion'),
(163, 'Palau', '680', 'PW / PLW', '19,907', '458', '221 Million'),
(164, 'Palestine', '970', 'PS / PSE', '3,800,000', '5,97', '6.641 Billion'),
(165, 'Panama', '507', 'PA / PAN', '3,410,676', '78,2', '40.62 Billion'),
(166, 'Papua New Guinea', '675', 'PG / PNG', '6,064,515', '462,84', '16.1 Billion'),
(167, 'Paraguay', '595', 'PY / PRY', '6,375,830', '406,75', '30.56 Billion'),
(168, 'Peru', '51', 'PE / PER', '29,907,003', '1,285,220', '210.3 Billion'),
(169, 'Philippines', '63', 'PH / PHL', '99,900,177', '300', '272.2 Billion'),
(170, 'Pitcairn', '64', 'PN / PCN', '46', '47', ''),
(171, 'Poland', '48', 'PL / POL', '38,500,000', '312,685', '513.9 Billion'),
(172, 'Portugal', '351', 'PT / PRT', '10,676,000', '92,391', '219.3 Billion'),
(173, 'Puerto Rico', '1-787', 'PR / PRI', '3,916,632', '9,104', '93.52 Billion'),
(174, 'Puerto Rico', '1-939', '', '', '', ''),
(175, 'Qatar', '974', 'QA / QAT', '840,926', '11,437', '213.1 Billion'),
(176, 'Republic of the Congo', '242', 'CG / COG', '3,039,126', '342', '14.25 Billion'),
(177, 'Reunion', '262', 'RE / REU', '776,948', '2,517', ''),
(178, 'Romania', '40', 'RO / ROU', '21,959,278', '237,5', '188.9 Billion'),
(179, 'Russia', '7', 'RU / RUS', '140,702,000', '17,100,000', '2.113 Trillion'),
(180, 'Rwanda', '250', 'RW / RWA', '11,055,976', '26,338', '7.7 Billion'),
(181, 'Saint Barthelemy', '590', 'BL / BLM', '8,45', '21', ''),
(182, 'Saint Helena', '290', 'SH / SHN', '7,46', '410', ''),
(183, 'Saint Kitts and Nevis', '1-869', 'KN / KNA', '51,134', '261', '767 Million'),
(184, 'Saint Lucia', '1-758', 'LC / LCA', '160,922', '616', '1.377 Billion'),
(185, 'Saint Martin', '590', 'MF / MAF', '35,925', '53', '561.5 Million'),
(186, 'Saint Pierre and Miquelon', '508', 'PM / SPM', '7,012', '242', '215.3 Million'),
(187, 'Saint Vincent and the Grenadines', '1-784', 'VC / VCT', '104,217', '389', '742 Million'),
(188, 'Samoa', '685', 'WS / WSM', '192,001', '2,944', '705 Million'),
(189, 'San Marino', '378', 'SM / SMR', '31,477', '61', '1.866 Billion'),
(190, 'Sao Tome and Principe', '239', 'ST / STP', '175,808', '1,001', '311 Million'),
(191, 'Saudi Arabia', '966', 'SA / SAU', '25,731,776', '1,960,582', '718.5 Billion'),
(192, 'Senegal', '221', 'SN / SEN', '12,323,252', '196,19', '15.36 Billion'),
(193, 'Serbia', '381', 'RS / SRB', '7,344,847', '88,361', '43.68 Billion'),
(194, 'Seychelles', '248', 'SC / SYC', '88,34', '455', '1.271 Billion'),
(195, 'Sierra Leone', '232', 'SL / SLE', '5,245,695', '71,74', '4.607 Billion'),
(196, 'Singapore', '65', 'SG / SGP', '4,701,069', '693', '295.7 Billion'),
(197, 'Sint Maarten', '1-721', 'SX / SXM', '37,429', '34', '794.7 Million'),
(198, 'Slovakia', '421', 'SK / SVK', '5,455,000', '48,845', '96.96 Billion'),
(199, 'Slovenia', '386', 'SI / SVN', '2,007,000', '20,273', '46.82 Billion'),
(200, 'Solomon Islands', '677', 'SB / SLB', '559,198', '28,45', '1.099 Billion'),
(201, 'Somalia', '252', 'SO / SOM', '10,112,453', '637,657', '2.372 Billion'),
(202, 'South Africa', '27', 'ZA / ZAF', '49,000,000', '1,219,912', '353.9 Billion'),
(203, 'South Korea', '82', 'KR / KOR', '48,422,644', '98,48', '1.198 Trillion'),
(204, 'South Sudan', '211', 'SS / SSD', '8,260,490', '644,329', '11.77 Billion'),
(205, 'Spain', '34', 'ES / ESP', '46,505,963', '504,782', '1.356 Trillion'),
(206, 'Sri Lanka', '94', 'LK / LKA', '21,513,990', '65,61', '65.12 Billion'),
(207, 'Sudan', '249', 'SD / SDN', '35,000,000', '1,861,484', '52.5 Billion'),
(208, 'Suriname', '597', 'SR / SUR', '492,829', '163,27', '5.009 Billion'),
(209, 'Svalbard and Jan Mayen', '47', 'SJ / SJM', '2,55', '62,049', ''),
(210, 'Swaziland', '268', 'SZ / SWZ', '1,354,051', '17,363', '3.807 Billion'),
(211, 'Sweden', '46', 'SE / SWE', '9,555,893', '449,964', '552 Billion'),
(212, 'Switzerland', '41', 'CH / CHE', '7,581,000', '41,29', '646.2 Billion'),
(213, 'Syria', '963', 'SY / SYR', '22,198,110', '185,18', '64.7 Billion'),
(214, 'Taiwan', '886', 'TW / TWN', '22,894,384', '35,98', '484.7 Billion'),
(215, 'Tajikistan', '992', 'TJ / TJK', '7,487,489', '143,1', '8.513 Billion'),
(216, 'Tanzania', '255', 'TZ / TZA', '41,892,895', '945,087', '31.94 Billion'),
(217, 'Thailand', '66', 'TH / THA', '67,089,500', '514', '400.9 Billion'),
(218, 'Togo', '228', 'TG / TGO', '6,587,239', '56,785', '4.299 Billion'),
(219, 'Tokelau', '690', 'TK / TKL', '1,466', '10', ''),
(220, 'Tonga', '676', 'TO / TON', '122,58', '748', '477 Million'),
(221, 'Trinidad and Tobago', '1-868', 'TT / TTO', '1,228,691', '5,128', '27.13 Billion'),
(222, 'Tunisia', '216', 'TN / TUN', '10,589,025', '163,61', '48.38 Billion'),
(223, 'Turkey', '90', 'TR / TUR', '77,804,122', '780,58', '821.8 Billion'),
(224, 'Turkmenistan', '993', 'TM / TKM', '4,940,916', '488,1', '40.56 Billion'),
(225, 'Turks and Caicos Islands', '1-649', 'TC / TCA', '20,556', '430', ''),
(226, 'Tuvalu', '688', 'TV / TUV', '10,472', '26', '38 Million'),
(227, 'U.S. Virgin Islands', '1-340', 'VI / VIR', '108,708', '352', ''),
(228, 'Uganda', '256', 'UG / UGA', '33,398,682', '236,04', '22.6 Billion'),
(229, 'Ukraine', '380', 'UA / UKR', '45,415,596', '603,7', '175.5 Billion'),
(230, 'United Arab Emirates', '971', 'AE / ARE', '4,975,593', '82,88', '390 Billion'),
(231, 'United Kingdom', '44', 'GB / GBR', '62,348,447', '244,82', '2.49 Trillion'),
(232, 'United States', '1', 'US / USA', '310,232,863', '9,629,091', '16.72 Trillion'),
(233, 'Uruguay', '598', 'UY / URY', '3,477,000', '176,22', '57.11 Billion'),
(234, 'Uzbekistan', '998', 'UZ / UZB', '27,865,738', '447,4', '55.18 Billion'),
(235, 'Vanuatu', '678', 'VU / VUT', '221,552', '12,2', '828 Million'),
(236, 'Vatican', '379', 'VA / VAT', '921', '0', ''),
(237, 'Venezuela', '58', 'VE / VEN', '27,223,228', '912,05', '367.5 Billion'),
(238, 'Vietnam', '84', 'VN / VNM', '89,571,130', '329,56', '170 Billion'),
(239, 'Wallis and Futuna', '681', 'WF / WLF', '16,025', '274', ''),
(240, 'Western Sahara', '212', 'EH / ESH', '273,008', '266', ''),
(241, 'Yemen', '967', 'YE / YEM', '23,495,361', '527,97', '43.89 Billion'),
(242, 'Zambia', '260', 'ZM / ZMB', '13,460,305', '752,614', '22.24 Billion'),
(243, 'Zimbabwe', '263', 'ZW / ZWE', '11,651,858', '390,58', '10.48 Billion');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_countrycode_old`
--

CREATE TABLE `kg_countrycode_old` (
  `id` int(11) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `iso` varchar(255) DEFAULT NULL,
  `population` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `gdp` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kg_countrycode_old`
--

INSERT INTO `kg_countrycode_old` (`id`, `country`, `code`, `iso`, `population`, `area`, `gdp`) VALUES
(1, 'Afghanistan', '93', 'AF / AFG', '29,121,286', '647,5', '20.65 Billion'),
(2, 'Albania', '355', 'AL / ALB', '2,986,952', '28,748', '12.8 Billion'),
(3, 'Algeria', '213', 'DZ / DZA', '34,586,184', '2,381,740', '215.7 Billion'),
(4, 'American Samoa', '1-684', 'AS / ASM', '57,881', '199', '462.2 Million'),
(5, 'Andorra', '376', 'AD / AND', '84', '468', '4.8 Billion'),
(6, 'Angola', '244', 'AO / AGO', '13,068,161', '1,246,700', '124 Billion'),
(7, 'Anguilla', '1-264', 'AI / AIA', '13,254', '102', '175.4 Million'),
(8, 'Antarctica', '672', 'AQ / ATA', '0', '14,000,000', ''),
(9, 'Antigua and Barbuda', '1-268', 'AG / ATG', '86,754', '443', '1.22 Billion'),
(10, 'Argentina', '54', 'AR / ARG', '41,343,201', '2,766,890', '484.6 Billion'),
(11, 'Armenia', '374', 'AM / ARM', '2,968,000', '29,8', '10.44 Billion'),
(12, 'Aruba', '297', 'AW / ABW', '71,566', '193', '2.516 Billion'),
(13, 'Australia', '61', 'AU / AUS', '21,515,754', '7,686,850', '1.488 Trillion'),
(14, 'Austria', '43', 'AT / AUT', '8,205,000', '83,858', '417.9 Billion'),
(15, 'Azerbaijan', '994', 'AZ / AZE', '8,303,512', '86,6', '76.01 Billion'),
(16, 'Bahamas', '1-242', 'BS / BHS', '301,79', '13,94', '8.373 Billion'),
(17, 'Bahrain', '973', 'BH / BHR', '738,004', '665', '28.36 Billion'),
(18, 'Bangladesh', '880', 'BD / BGD', '156,118,464', '144', '140.2 Billion'),
(19, 'Barbados', '1-246', 'BB / BRB', '285,653', '431', '4.262 Billion'),
(20, 'Belarus', '375', 'BY / BLR', '9,685,000', '207,6', '69.24 Billion'),
(21, 'Belgium', '32', 'BE / BEL', '10,403,000', '30,51', '507.4 Billion'),
(22, 'Belize', '501', 'BZ / BLZ', '314,522', '22,966', '1.637 Billion'),
(23, 'Benin', '229', 'BJ / BEN', '9,056,010', '112,62', '8.359 Billion'),
(24, 'Bermuda', '1-441', 'BM / BMU', '65,365', '53', '5.6 Billion'),
(25, 'Bhutan', '975', 'BT / BTN', '699,847', '47', '2.133 Billion'),
(26, 'Bolivia', '591', 'BO / BOL', '9,947,418', '1,098,580', '30.79 Billion'),
(27, 'Bosnia and Herzegovina', '387', 'BA / BIH', '4,590,000', '51,129', '18.87 Billion'),
(28, 'Botswana', '267', 'BW / BWA', '2,029,307', '600,37', '15.53 Billion'),
(29, 'Brazil', '55', 'BR / BRA', '201,103,330', '8,511,965', '2.19 Trillion'),
(30, 'British Indian Ocean Territory', '246', 'IO / IOT', '4', '60', ''),
(31, 'British Virgin Islands', '1-284', 'VG / VGB', '21,73', '153', '1.095 Billion'),
(32, 'Brunei', '673', 'BN / BRN', '395,027', '5,77', '16.56 Billion'),
(33, 'Bulgaria', '359', 'BG / BGR', '7,148,785', '110,91', '53.7 Billion'),
(34, 'Burkina Faso', '226', 'BF / BFA', '16,241,811', '274,2', '12.13 Billion'),
(35, 'Burundi', '257', 'BI / BDI', '9,863,117', '27,83', '2.676 Billion'),
(36, 'Cambodia', '855', 'KH / KHM', '14,453,680', '181,04', '15.64 Billion'),
(37, 'Cameroon', '237', 'CM / CMR', '19,294,149', '475,44', '27.88 Billion'),
(38, 'Canada', '1', 'CA / CAN', '33,679,000', '9,984,670', '1.825 Trillion'),
(39, 'Cape Verde', '238', 'CV / CPV', '508,659', '4,033', '1.955 Billion'),
(40, 'Cayman Islands', '1-345', 'KY / CYM', '44,27', '262', '2.25 Billion'),
(41, 'Central African Republic', '236', 'CF / CAF', '4,844,927', '622,984', '2.05 Billion'),
(42, 'Chad', '235', 'TD / TCD', '10,543,464', '1,284,000', '13.59 Billion'),
(43, 'Chile', '56', 'CL / CHL', '16,746,491', '756,95', '281.7 Billion'),
(44, 'China', '86', 'CN / CHN', '1,330,044,000', '9,596,960', '9.33 Trillion'),
(45, 'Christmas Island', '61', 'CX / CXR', '1,5', '135', ''),
(46, 'Cocos Islands', '61', 'CC / CCK', '628', '14', ''),
(47, 'Colombia', '57', 'CO / COL', '47,790,000', '1,138,910', '369.2 Billion'),
(48, 'Comoros', '269', 'KM / COM', '773,407', '2,17', '658 Million'),
(49, 'Cook Islands', '682', 'CK / COK', '21,388', '240', '183.2 Million'),
(50, 'Costa Rica', '506', 'CR / CRI', '4,516,220', '51,1', '48.51 Billion'),
(51, 'Croatia', '385', 'HR / HRV', '4,491,000', '56,542', '59.14 Billion'),
(52, 'Cuba', '53', 'CU / CUB', '11,423,000', '110,86', '72.3 Billion'),
(53, 'Curacao', '599', 'CW / CUW', '141,766', '444', '5.6 Billion'),
(54, 'Cyprus', '357', 'CY / CYP', '1,102,677', '9,25', '21.78 Billion'),
(55, 'Czech Republic', '420', 'CZ / CZE', '10,476,000', '78,866', '194.8 Billion'),
(56, 'Democratic Republic of the Congo', '243', 'CD / COD', '70,916,439', '2,345,410', '18.56 Billion'),
(57, 'Denmark', '45', 'DK / DNK', '5,484,000', '43,094', '324.3 Billion'),
(58, 'Djibouti', '253', 'DJ / DJI', '740,528', '23', '1.459 Billion'),
(59, 'Dominica', '1-767', 'DM / DMA', '72,813', '754', '495 Million'),
(60, 'Dominica', '1-767', 'DM / DMA', '72,813', '754', '495 Million'),
(61, 'Dominican Republic', '1-809', 'DO / DOM', '9,823,821', '48,73', '59.27 Billion'),
(62, 'Dominican Republic', '1-829', '', '', '', ''),
(63, 'East Timor', '670', 'TL / TLS', '1,154,625', '15,007', '6.129 Billion'),
(64, 'Ecuador', '593', 'EC / ECU', '14,790,608', '283,56', '91.41 Billion'),
(65, 'Egypt', '20', 'EG / EGY', '80,471,869', '1,001,450', '262 Billion'),
(66, 'El Salvador', '503', 'SV / SLV', '6,052,064', '21,04', '24.67 Billion'),
(67, 'Equatorial Guinea', '240', 'GQ / GNQ', '1,014,999', '28,051', '17.08 Billion'),
(68, 'Eritrea', '291', 'ER / ERI', '5,792,984', '121,32', '3.438 Billion'),
(69, 'Estonia', '372', 'EE / EST', '1,291,170', '45,226', '24.28 Billion'),
(70, 'Ethiopia', '251', 'ET / ETH', '88,013,491', '1,127,127', '47.34 Billion'),
(71, 'Falkland Islands', '500', 'FK / FLK', '2,638', '12,173', '164.5 Million'),
(72, 'Faroe Islands', '298', 'FO / FRO', '48,228', '1,399', '2.32 Billion'),
(73, 'Fiji', '679', 'FJ / FJI', '875,983', '18,27', '4.218 Billion'),
(74, 'Finland', '358', 'FI / FIN', '5,244,000', '337,03', '259.6 Billion'),
(75, 'France', '33', 'FR / FRA', '64,768,389', '547,03', '2.739 Trillion'),
(76, 'French Polynesia', '689', 'PF / PYF', '270,485', '4,167', '5.65 Billion'),
(77, 'Gabon', '241', 'GA / GAB', '1,545,255', '267,667', '19.97 Billion'),
(78, 'Gambia', '220', 'GM / GMB', '1,593,256', '11,3', '896 Million'),
(79, 'Georgia', '995', 'GE / GEO', '4,630,000', '69,7', '15.95 Billion'),
(80, 'Germany', '49', 'DE / DEU', '81,802,257', '357,021', '3.593 Trillion'),
(81, 'Ghana', '233', 'GH / GHA', '24,339,838', '239,46', '45.55 Billion'),
(82, 'Gibraltar', '350', 'GI / GIB', '27,884', '7', '1.106 Billion'),
(83, 'Greece', '30', 'GR / GRC', '11,000,000', '131,94', '243.3 Billion'),
(84, 'Greenland', '299', 'GL / GRL', '56,375', '2,166,086', '2.16 Billion'),
(85, 'Grenada', '1-473', 'GD / GRD', '107,818', '344', '811 Million'),
(86, 'Guam', '1-671', 'GU / GUM', '159,358', '549', '4.6 Billion'),
(87, 'Guatemala', '502', 'GT / GTM', '13,550,440', '108,89', '53.9 Billion'),
(88, 'Guernsey', '44-1481', 'GG / GGY', '65,228', '78', '2.742 Billion'),
(89, 'Guinea', '224', 'GN / GIN', '10,324,025', '245,857', '6.544 Billion'),
(90, 'Guinea-Bissau', '245', 'GW / GNB', '1,565,126', '36,12', '880 Million'),
(91, 'Guyana', '592', 'GY / GUY', '748,486', '214,97', '3.02 Billion'),
(92, 'Haiti', '509', 'HT / HTI', '9,648,924', '27,75', '8.287 Billion'),
(93, 'Honduras', '504', 'HN / HND', '7,989,415', '112,09', '18.88 Billion'),
(94, 'Hong Kong', '852', 'HK / HKG', '6,898,686', '1,092', '272.1 Billion'),
(95, 'Hungary', '36', 'HU / HUN', '9,982,000', '93,03', '130.6 Billion'),
(96, 'Iceland', '354', 'IS / ISL', '308,91', '103', '14.59 Billion'),
(97, 'India', '91', 'IN / IND', '1,173,108,018', '3,287,590', '1.67 Trillion'),
(98, 'Indonesia', '62', 'ID / IDN', '242,968,342', '1,919,440', '867.5 Billion'),
(99, 'Iran', '98', 'IR / IRN', '76,923,300', '1,648,000', '411.9 Billion'),
(100, 'Iraq', '964', 'IQ / IRQ', '29,671,605', '437,072', '221.8 Billion'),
(101, 'Ireland', '353', 'IE / IRL', '4,622,917', '70,28', '220.9 Billion'),
(102, 'Isle of Man', '44-1624', 'IM / IMN', '75,049', '572', '4.076 Billion'),
(103, 'Israel', '972', 'IL / ISR', '7,353,985', '20,77', '272.7 Billion'),
(104, 'Italy', '39', 'IT / ITA', '60,340,328', '301,23', '2.068 Trillion'),
(105, 'Ivory Coast', '225', 'CI / CIV', '21,058,798', '322,46', '28.28 Billion'),
(106, 'Jamaica', '1-876', 'JM / JAM', '2,847,232', '10,991', '14.39 Billion'),
(107, 'Japan', '81', 'JP / JPN', '127,288,000', '377,835', '5.007 Trillion'),
(108, 'Jersey', '44-1534', 'JE / JEY', '90,812', '116', '5.1 Billion'),
(109, 'Jordan', '962', 'JO / JOR', '6,407,085', '92,3', '34.08 Billion'),
(110, 'Kazakhstan', '7', 'KZ / KAZ', '15,340,000', '2,717,300', '224.9 Billion'),
(111, 'Kenya', '254', 'KE / KEN', '40,046,566', '582,65', '45.31 Billion'),
(112, 'Kiribati', '686', 'KI / KIR', '92,533', '811', '173 Million'),
(113, 'Kosovo', '383', 'XK / XKX', '1,800,000', '10,887', '7.15 Billion'),
(114, 'Kuwait', '965', 'KW / KWT', '2,789,132', '17,82', '179.5 Billion'),
(115, 'Kyrgyzstan', '996', 'KG / KGZ', '5,508,626', '198,5', '7.234 Billion'),
(116, 'Laos', '856', 'LA / LAO', '6,368,162', '236,8', '10.1 Billion'),
(117, 'Latvia', '371', 'LV / LVA', '2,217,969', '64,589', '30.38 Billion'),
(118, 'Lebanon', '961', 'LB / LBN', '4,125,247', '10,4', '43.49 Billion'),
(119, 'Lesotho', '266', 'LS / LSO', '1,919,552', '30,355', '2.457 Billion'),
(120, 'Liberia', '231', 'LR / LBR', '3,685,076', '111,37', '1.977 Billion'),
(121, 'Libya', '218', 'LY / LBY', '6,461,454', '1,759,540', '70.92 Billion'),
(122, 'Liechtenstein', '423', 'LI / LIE', '35', '160', '5.113 Billion'),
(123, 'Lithuania', '370', 'LT / LTU', '2,944,459', '65,2', '46.71 Billion'),
(124, 'Luxembourg', '352', 'LU / LUX', '497,538', '2,586', '60.54 Billion'),
(125, 'Macao', '853', 'MO / MAC', '449,198', '254', '51.68 Billion'),
(126, 'Macedonia', '389', 'MK / MKD', '2,062,294', '25,333', '10.65 Billion'),
(127, 'Madagascar', '261', 'MG / MDG', '21,281,844', '587,04', '10.53 Billion'),
(128, 'Malawi', '265', 'MW / MWI', '15,447,500', '118,48', '3.683 Billion'),
(129, 'Malaysia', '60', 'MY / MYS', '28,274,729', '329,75', '312.4 Billion'),
(130, 'Maldives', '960', 'MV / MDV', '395,65', '300', '2.27 Billion'),
(131, 'Mali', '223', 'ML / MLI', '13,796,354', '1,240,000', '11.37 Billion'),
(132, 'Malta', '356', 'MT / MLT', '403', '316', '9.541 Billion'),
(133, 'Marshall Islands', '692', 'MH / MHL', '65,859', '181', '193 Million'),
(134, 'Mauritania', '222', 'MR / MRT', '3,205,060', '1,030,700', '4.183 Billion'),
(135, 'Mauritius', '230', 'MU / MUS', '1,294,104', '2,04', '11.9 Billion'),
(136, 'Mayotte', '262', 'YT / MYT', '159,042', '374', ''),
(137, 'Mexico', '52', 'MX / MEX', '112,468,855', '1,972,550', '1.327 Trillion'),
(138, 'Micronesia', '691', 'FM / FSM', '107,708', '702', '339 Million'),
(139, 'Moldova', '373', 'MD / MDA', '4,324,000', '33,843', '7.932 Billion'),
(140, 'Monaco', '377', 'MC / MCO', '32,965', '2', '5.748 Billion'),
(141, 'Mongolia', '976', 'MN / MNG', '3,086,918', '1,565,000', '11.14 Billion'),
(142, 'Montenegro', '382', 'ME / MNE', '666,73', '14,026', '4.518 Billion'),
(143, 'Montserrat', '1-664', 'MS / MSR', '9,341', '102', ''),
(144, 'Morocco', '212', 'MA / MAR', '31,627,428', '446,55', '104.8 Billion'),
(145, 'Mozambique', '258', 'MZ / MOZ', '22,061,451', '801,59', '14.67 Billion'),
(146, 'Myanmar', '95', 'MM / MMR', '53,414,374', '678,5', '59.43 Billion'),
(147, 'Namibia', '264', 'NA / NAM', '2,128,471', '825,418', '12.3 Billion'),
(148, 'Nauru', '674', 'NR / NRU', '10,065', '21', ''),
(149, 'Nepal', '977', 'NP / NPL', '28,951,852', '140,8', '19.34 Billion'),
(150, 'Netherlands', '31', 'NL / NLD', '16,645,000', '41,526', '722.3 Billion'),
(151, 'Netherlands Antilles', '599', 'AN / ANT', '136,197', '960', ''),
(152, 'New Caledonia', '687', 'NC / NCL', '216,494', '19,06', '9.28 Billion'),
(153, 'New Zealand', '64', 'NZ / NZL', '4,252,277', '268,68', '181.1 Billion'),
(154, 'Nicaragua', '505', 'NI / NIC', '5,995,928', '129,494', '11.26 Billion'),
(155, 'Niger', '227', 'NE / NER', '15,878,271', '1,267,000', '7.304 Billion'),
(156, 'Nigeria', '234', 'NG / NGA', '154,000,000', '923,768', '502 Billion'),
(157, 'Niue', '683', 'NU / NIU', '2,166', '260', '10.01 Million'),
(158, 'North Korea', '850', 'KP / PRK', '22,912,177', '120,54', '28 Billion'),
(159, 'Northern Mariana Islands', '1-670', 'MP / MNP', '53,883', '477', '733 Million'),
(160, 'Norway', '47', 'NO / NOR', '5,009,150', '324,22', '515.8 Billion'),
(161, 'Oman', '968', 'OM / OMN', '2,967,717', '212,46', '81.95 Billion'),
(162, 'Pakistan', '92', 'PK / PAK', '184,404,791', '803,94', '236.5 Billion'),
(163, 'Palau', '680', 'PW / PLW', '19,907', '458', '221 Million'),
(164, 'Palestine', '970', 'PS / PSE', '3,800,000', '5,97', '6.641 Billion'),
(165, 'Panama', '507', 'PA / PAN', '3,410,676', '78,2', '40.62 Billion'),
(166, 'Papua New Guinea', '675', 'PG / PNG', '6,064,515', '462,84', '16.1 Billion'),
(167, 'Paraguay', '595', 'PY / PRY', '6,375,830', '406,75', '30.56 Billion'),
(168, 'Peru', '51', 'PE / PER', '29,907,003', '1,285,220', '210.3 Billion'),
(169, 'Philippines', '63', 'PH / PHL', '99,900,177', '300', '272.2 Billion'),
(170, 'Pitcairn', '64', 'PN / PCN', '46', '47', ''),
(171, 'Poland', '48', 'PL / POL', '38,500,000', '312,685', '513.9 Billion'),
(172, 'Portugal', '351', 'PT / PRT', '10,676,000', '92,391', '219.3 Billion'),
(173, 'Puerto Rico', '1-787', 'PR / PRI', '3,916,632', '9,104', '93.52 Billion'),
(174, 'Puerto Rico', '1-939', '', '', '', ''),
(175, 'Qatar', '974', 'QA / QAT', '840,926', '11,437', '213.1 Billion'),
(176, 'Republic of the Congo', '242', 'CG / COG', '3,039,126', '342', '14.25 Billion'),
(177, 'Reunion', '262', 'RE / REU', '776,948', '2,517', ''),
(178, 'Romania', '40', 'RO / ROU', '21,959,278', '237,5', '188.9 Billion'),
(179, 'Russia', '7', 'RU / RUS', '140,702,000', '17,100,000', '2.113 Trillion'),
(180, 'Rwanda', '250', 'RW / RWA', '11,055,976', '26,338', '7.7 Billion'),
(181, 'Saint Barthelemy', '590', 'BL / BLM', '8,45', '21', ''),
(182, 'Saint Helena', '290', 'SH / SHN', '7,46', '410', ''),
(183, 'Saint Kitts and Nevis', '1-869', 'KN / KNA', '51,134', '261', '767 Million'),
(184, 'Saint Lucia', '1-758', 'LC / LCA', '160,922', '616', '1.377 Billion'),
(185, 'Saint Martin', '590', 'MF / MAF', '35,925', '53', '561.5 Million'),
(186, 'Saint Pierre and Miquelon', '508', 'PM / SPM', '7,012', '242', '215.3 Million'),
(187, 'Saint Vincent and the Grenadines', '1-784', 'VC / VCT', '104,217', '389', '742 Million'),
(188, 'Samoa', '685', 'WS / WSM', '192,001', '2,944', '705 Million'),
(189, 'San Marino', '378', 'SM / SMR', '31,477', '61', '1.866 Billion'),
(190, 'Sao Tome and Principe', '239', 'ST / STP', '175,808', '1,001', '311 Million'),
(191, 'Saudi Arabia', '966', 'SA / SAU', '25,731,776', '1,960,582', '718.5 Billion'),
(192, 'Senegal', '221', 'SN / SEN', '12,323,252', '196,19', '15.36 Billion'),
(193, 'Serbia', '381', 'RS / SRB', '7,344,847', '88,361', '43.68 Billion'),
(194, 'Seychelles', '248', 'SC / SYC', '88,34', '455', '1.271 Billion'),
(195, 'Sierra Leone', '232', 'SL / SLE', '5,245,695', '71,74', '4.607 Billion'),
(196, 'Singapore', '65', 'SG / SGP', '4,701,069', '693', '295.7 Billion'),
(197, 'Sint Maarten', '1-721', 'SX / SXM', '37,429', '34', '794.7 Million'),
(198, 'Slovakia', '421', 'SK / SVK', '5,455,000', '48,845', '96.96 Billion'),
(199, 'Slovenia', '386', 'SI / SVN', '2,007,000', '20,273', '46.82 Billion'),
(200, 'Solomon Islands', '677', 'SB / SLB', '559,198', '28,45', '1.099 Billion'),
(201, 'Somalia', '252', 'SO / SOM', '10,112,453', '637,657', '2.372 Billion'),
(202, 'South Africa', '27', 'ZA / ZAF', '49,000,000', '1,219,912', '353.9 Billion'),
(203, 'South Korea', '82', 'KR / KOR', '48,422,644', '98,48', '1.198 Trillion'),
(204, 'South Sudan', '211', 'SS / SSD', '8,260,490', '644,329', '11.77 Billion'),
(205, 'Spain', '34', 'ES / ESP', '46,505,963', '504,782', '1.356 Trillion'),
(206, 'Sri Lanka', '94', 'LK / LKA', '21,513,990', '65,61', '65.12 Billion'),
(207, 'Sudan', '249', 'SD / SDN', '35,000,000', '1,861,484', '52.5 Billion'),
(208, 'Suriname', '597', 'SR / SUR', '492,829', '163,27', '5.009 Billion'),
(209, 'Svalbard and Jan Mayen', '47', 'SJ / SJM', '2,55', '62,049', ''),
(210, 'Swaziland', '268', 'SZ / SWZ', '1,354,051', '17,363', '3.807 Billion'),
(211, 'Sweden', '46', 'SE / SWE', '9,555,893', '449,964', '552 Billion'),
(212, 'Switzerland', '41', 'CH / CHE', '7,581,000', '41,29', '646.2 Billion'),
(213, 'Syria', '963', 'SY / SYR', '22,198,110', '185,18', '64.7 Billion'),
(214, 'Taiwan', '886', 'TW / TWN', '22,894,384', '35,98', '484.7 Billion'),
(215, 'Tajikistan', '992', 'TJ / TJK', '7,487,489', '143,1', '8.513 Billion'),
(216, 'Tanzania', '255', 'TZ / TZA', '41,892,895', '945,087', '31.94 Billion'),
(217, 'Thailand', '66', 'TH / THA', '67,089,500', '514', '400.9 Billion'),
(218, 'Togo', '228', 'TG / TGO', '6,587,239', '56,785', '4.299 Billion'),
(219, 'Tokelau', '690', 'TK / TKL', '1,466', '10', ''),
(220, 'Tonga', '676', 'TO / TON', '122,58', '748', '477 Million'),
(221, 'Trinidad and Tobago', '1-868', 'TT / TTO', '1,228,691', '5,128', '27.13 Billion'),
(222, 'Tunisia', '216', 'TN / TUN', '10,589,025', '163,61', '48.38 Billion'),
(223, 'Turkey', '90', 'TR / TUR', '77,804,122', '780,58', '821.8 Billion'),
(224, 'Turkmenistan', '993', 'TM / TKM', '4,940,916', '488,1', '40.56 Billion'),
(225, 'Turks and Caicos Islands', '1-649', 'TC / TCA', '20,556', '430', ''),
(226, 'Tuvalu', '688', 'TV / TUV', '10,472', '26', '38 Million'),
(227, 'U.S. Virgin Islands', '1-340', 'VI / VIR', '108,708', '352', ''),
(228, 'Uganda', '256', 'UG / UGA', '33,398,682', '236,04', '22.6 Billion'),
(229, 'Ukraine', '380', 'UA / UKR', '45,415,596', '603,7', '175.5 Billion'),
(230, 'United Arab Emirates', '971', 'AE / ARE', '4,975,593', '82,88', '390 Billion'),
(231, 'United Kingdom', '44', 'GB / GBR', '62,348,447', '244,82', '2.49 Trillion'),
(232, 'United States', '1', 'US / USA', '310,232,863', '9,629,091', '16.72 Trillion'),
(233, 'Uruguay', '598', 'UY / URY', '3,477,000', '176,22', '57.11 Billion'),
(234, 'Uzbekistan', '998', 'UZ / UZB', '27,865,738', '447,4', '55.18 Billion'),
(235, 'Vanuatu', '678', 'VU / VUT', '221,552', '12,2', '828 Million'),
(236, 'Vatican', '379', 'VA / VAT', '921', '0', ''),
(237, 'Venezuela', '58', 'VE / VEN', '27,223,228', '912,05', '367.5 Billion'),
(238, 'Vietnam', '84', 'VN / VNM', '89,571,130', '329,56', '170 Billion'),
(239, 'Wallis and Futuna', '681', 'WF / WLF', '16,025', '274', ''),
(240, 'Western Sahara', '212', 'EH / ESH', '273,008', '266', ''),
(241, 'Yemen', '967', 'YE / YEM', '23,495,361', '527,97', '43.89 Billion'),
(242, 'Zambia', '260', 'ZM / ZMB', '13,460,305', '752,614', '22.24 Billion'),
(243, 'Zimbabwe', '263', 'ZW / ZWE', '11,651,858', '390,58', '10.48 Billion');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_country_old`
--

CREATE TABLE `kg_country_old` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `create_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_country_old`
--

INSERT INTO `kg_country_old` (`id`, `title`, `modify_date`, `modify_user_id`, `create_date`, `create_user_id`) VALUES
(1, 'Afghanistan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'Aland Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'Albania', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 'Algeria', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 'American Samoa', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'Andorra', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 'Angola', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 'Anguilla', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 'Antarctica', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(10, 'Antigua and Barbuda', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(11, 'Argentina', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(12, 'Armenia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(13, 'Aruba', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(14, 'Australia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(15, 'Austria', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(16, 'Azerbaijan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(17, 'Bahamas', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(18, 'Bahrain', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(19, 'Bangladesh', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(20, 'Barbados', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(21, 'Belarus', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(22, 'Belgium', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(23, 'Belize', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(24, 'Benin', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(25, 'Bermuda', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(26, 'Bhutan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(27, 'Bolivia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(28, 'Bosnia and Herzegovina', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(29, 'Botswana', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(30, 'Bouvet Island', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(31, 'Brazil', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(32, 'British Indian Ocean Territory', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(33, 'British Virgin Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(34, 'Brunei', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(35, 'Bulgaria', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(36, 'Burkina Faso', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(37, 'Burundi', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(38, 'Cambodia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, 'Cameroon', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, 'Canada', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, 'Cape Verde', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, 'Cayman Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, 'Central African Republic', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, 'Chad', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, 'Chile', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, 'China', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(47, 'Christmas Island', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, 'Cocos (Keeling) Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, 'Colombia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, 'Comoros', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, 'Congo', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, 'Cook Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, 'Costa Rica', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, 'Croatia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, 'Cuba', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, 'Cyprus', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, 'Czech Republic', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, 'Democratic Republic of Congo', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, 'Denmark', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, 'Disputed Territory', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, 'Djibouti', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, 'Dominica', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, 'Dominican Republic', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, 'East Timor', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, 'Ecuador', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, 'Egypt', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, 'El Salvador', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, 'Equatorial Guinea', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, 'Eritrea', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(70, 'Estonia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, 'Ethiopia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, 'Falkland Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, 'Faroe Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(74, 'Federated States of Micronesia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, 'Fiji', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, 'Finland', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(77, 'France', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, 'French Guyana', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, 'French Polynesia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(80, 'French Southern Territories', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(81, 'Gabon', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(82, 'Gambia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(83, 'Georgia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(84, 'Germany', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(85, 'Ghana', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(86, 'Gibraltar', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(87, 'Greece', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(88, 'Greenland', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(89, 'Grenada', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(90, 'Guadeloupe', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(91, 'Guam', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(92, 'Guatemala', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(93, 'Guinea', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(94, 'Guinea-Bissau', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(95, 'Guyana', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(96, 'Haiti', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(97, 'Heard Island and Mcdonald Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(98, 'Honduras', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(99, 'Hong Kong', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(100, 'Hungary', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(101, 'Iceland', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(102, 'India', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(103, 'Indonesia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(104, 'Iran', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(105, 'Iraq', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(106, 'Iraq-Saudi Arabia Neutral Zone', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(107, 'Ireland', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(108, 'Israel', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(109, 'Italy', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(110, 'Ivory Coast', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(111, 'Jamaica', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(112, 'Japan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(113, 'Jordan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(114, 'Kazakhstan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(115, 'Kenya', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(116, 'Kiribati', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(117, 'Kuwait', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(118, 'Kyrgyzstan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(119, 'Laos', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(120, 'Latvia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(121, 'Lebanon', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(122, 'Lesotho', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(123, 'Liberia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(124, 'Libya', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(125, 'Liechtenstein', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(126, 'Lithuania', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(127, 'Luxembourg', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(128, 'Macau', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(129, 'Macedonia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(130, 'Madagascar', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(131, 'Malawi', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(132, 'Malaysia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(133, 'Maldives', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(134, 'Mali', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(135, 'Malta', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(136, 'Marshall Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(137, 'Martinique', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(138, 'Mauritania', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(139, 'Mauritius', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(140, 'Mayotte', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(141, 'Mexico', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(142, 'Moldova', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(143, 'Monaco', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(144, 'Mongolia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(145, 'Montserrat', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(146, 'Morocco', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(147, 'Mozambique', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(148, 'Myanmar', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(149, 'Namibia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(150, 'Nauru', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(151, 'Nepal', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(152, 'Netherlands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(153, 'Netherlands Antilles', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(154, 'New Caledonia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(155, 'New Zealand', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(156, 'Nicaragua', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(157, 'Niger', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(158, 'Nigeria', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(159, 'Niue', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(160, 'Norfolk Island', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(161, 'North Korea', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(162, 'Northern Mariana Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(163, 'Norway', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(164, 'Oman', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(165, 'Pakistan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(166, 'Palau', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(167, 'Palestinian Occupied Territories', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(168, 'Panama', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(169, 'Papua New Guinea', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(170, 'Paraguay', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(171, 'Peru', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(172, 'Philippines', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(173, 'Pitcairn Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(174, 'Poland', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(175, 'Portugal', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(176, 'Puerto Rico', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(177, 'Qatar', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(178, 'Reunion', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(179, 'Romania', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(180, 'Russia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(181, 'Rwanda', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(182, 'Saint Helena and Dependencies', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(183, 'Saint Kitts and Nevis', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(184, 'Saint Lucia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(185, 'Saint Pierre and Miquelon', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(186, 'Saint Vincent and the Grenadines', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(187, 'Samoa', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(188, 'San Marino', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(189, 'Sao Tome and Principe', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(190, 'Saudi Arabia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(191, 'Senegal', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(192, 'Serbia and Montenegro', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(193, 'Seychelles', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(194, 'Sierra Leone', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(195, 'Singapore', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(196, 'Slovakia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(197, 'Slovenia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(198, 'Solomon Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(199, 'Somalia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(200, 'South Africa', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(201, 'South Georgia and South Sandwich Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(202, 'South Korea', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(203, 'Spain', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(204, 'Spratly Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(205, 'Sri Lanka', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(206, 'Sudan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(207, 'Suriname', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(208, 'Svalbard and Jan Mayen', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(209, 'Swaziland', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(210, 'Sweden', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(211, 'Switzerland', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(212, 'Syria', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(213, 'Taiwan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(214, 'Tajikistan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(215, 'Tanzania', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(216, 'Thailand', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(217, 'Togo', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(218, 'Tokelau', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(219, 'Tonga', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(220, 'Trinidad and Tobago', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(221, 'Tunisia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(222, 'Turkey', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(223, 'Turkmenistan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(224, 'Turks And Caicos Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(225, 'Tuvalu', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(226, 'Uganda', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(227, 'Ukraine', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(228, 'United Arab Emirates', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(229, 'United Kingdom', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(230, 'United Nations Neutral Zone', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(231, 'United States', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(232, 'United States Minor Outlying Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(233, 'Uruguay', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(234, 'US Virgin Islands', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(235, 'Uzbekistan', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(236, 'Vanuatu', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(237, 'Vatican City', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(238, 'Venezuela', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(239, 'Vietnam', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(240, 'Wallis and Futuna', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(241, 'Western Sahara', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(242, 'Yemen', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(243, 'Zambia', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(244, 'Zimbabwe', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_dashboard`
--

CREATE TABLE `kg_dashboard` (
  `id` tinyint(4) NOT NULL,
  `id_menu_admin` int(11) NOT NULL,
  `is_active` enum('Active','InActive') NOT NULL DEFAULT 'InActive',
  `sort` smallint(6) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_dokumen`
--

CREATE TABLE `kg_dokumen` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `contents` longtext DEFAULT NULL,
  `id_dokumen_category` smallint(6) NOT NULL DEFAULT 1,
  `is_publish` enum('Publish','NotPublish') NOT NULL DEFAULT 'NotPublish',
  `is_private` enum('Private','Public') NOT NULL DEFAULT 'Public',
  `is_featured` enum('Featured','NotFeatured') NOT NULL DEFAULT 'NotFeatured',
  `hits` int(11) DEFAULT 0,
  `sort` smallint(6) DEFAULT 1,
  `file` varchar(255) DEFAULT NULL,
  `file2` varchar(255) DEFAULT NULL,
  `file3` varchar(255) DEFAULT NULL,
  `file4` varchar(255) DEFAULT NULL,
  `file5` varchar(255) DEFAULT NULL,
  `publish_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modify_user_id` int(11) DEFAULT NULL,
  `modify_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_user_id` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_lang` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_dokumen_category`
--

CREATE TABLE `kg_dokumen_category` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `modify_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_hotel`
--

CREATE TABLE `kg_hotel` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `kuota` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_invoice`
--

CREATE TABLE `kg_invoice` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL DEFAULT 0,
  `no_invoice` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `date_payment` date NOT NULL DEFAULT '0000-00-00',
  `payment` varchar(255) DEFAULT NULL,
  `price` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `totalamount` double NOT NULL,
  `transidmerchant` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `session_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `response_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `creditcard` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `bank` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `approvalcode` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `starttime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `finishtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_special` tinyint(4) NOT NULL DEFAULT 0,
  `status` enum('Requested','Verified','Fail','Success','Pending','Paid','Reject','FREE') CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'Requested',
  `keterangan` text NOT NULL,
  `date_approved` datetime DEFAULT '0000-00-00 00:00:00',
  `modify_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_kurs`
--

CREATE TABLE `kg_kurs` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `vaz` varchar(255) DEFAULT NULL,
  `paramz` longtext DEFAULT NULL,
  `expired_date` datetime DEFAULT NULL,
  `modify_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_leaders`
--

CREATE TABLE `kg_leaders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_eng` varchar(255) DEFAULT NULL,
  `headline` text DEFAULT NULL,
  `headline_eng` text DEFAULT NULL,
  `contents` longtext NOT NULL,
  `contents_eng` longtext DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image_mobile` varchar(255) DEFAULT NULL,
  `title_image` varchar(255) DEFAULT NULL,
  `title_image_mobile` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_desc` text DEFAULT NULL,
  `seo_title_eng` varchar(255) DEFAULT NULL,
  `seo_desc_eng` text DEFAULT NULL,
  `is_publish` tinyint(4) NOT NULL DEFAULT 0,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0,
  `slug` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `warna_head` varchar(255) DEFAULT NULL,
  `warna_caption` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 20,
  `publish_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_leaders`
--

INSERT INTO `kg_leaders` (`id`, `title`, `title_eng`, `headline`, `headline_eng`, `contents`, `contents_eng`, `image`, `image_mobile`, `title_image`, `title_image_mobile`, `seo_title`, `seo_desc`, `seo_title_eng`, `seo_desc_eng`, `is_publish`, `is_featured`, `slug`, `link`, `warna_head`, `warna_caption`, `urutan`, `publish_date`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`, `is_delete`) VALUES
(1, 'Joko Widodo', NULL, 'President Republic of Indonesia', NULL, '', NULL, '1.png', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Joko-Widodo', NULL, NULL, NULL, 1, NULL, 1, '2024-07-31 23:04:51', 999, '2024-07-08 20:42:07', 0),
(2, 'Prabowo Subianto', NULL, 'President Elect of the Republic of Indonesia/Minister of Defense', NULL, '', NULL, '2.png', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Prabowo-Subianto', NULL, NULL, NULL, 2, NULL, 1, '2024-07-23 11:34:43', 999, '2024-07-08 20:45:30', 0),
(4, 'Gabriel Boric', NULL, 'President of Chile', NULL, '', NULL, '53.png', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Gabriel-Boric', NULL, NULL, NULL, 4, NULL, 1, '2024-07-17 10:03:37', 1, '2024-07-10 14:06:08', 0),
(5, 'Rebecca Grynspan', NULL, 'Secretary-General UNCTAD', NULL, '<p>Rebecca Grynspan is Secretary-General UNCTAD</p>\r\n', NULL, 'Photo_Frame_HLF_MSP_(10)1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Rebecca-Grynspan', NULL, NULL, NULL, 5, NULL, 1, '2024-07-29 14:29:40', 1, '2024-07-10 14:10:01', 0),
(6, 'Febrian A. Ruddyard', NULL, 'Ambassador Plenitpotentiary, Permanent Representative of Indonesia Mission to UN, WTO and other International Organizations in Geneva', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(2).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Febrian-A-Ruddyard', NULL, NULL, NULL, 6, NULL, 1, '2024-07-28 12:14:45', 1, '2024-07-23 14:33:27', 0),
(7, 'Carlos María Correa', NULL, 'Executive Director of the South Centre', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(3).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Carlos-María-Correa', NULL, NULL, NULL, 7, NULL, 1, '2024-07-29 10:12:35', 1, '2024-07-23 14:34:39', 0),
(8, 'Lili Yan Ing', NULL, 'Lead Advisor, Economic Research Institute for ASEAN and East Asia', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(4).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Lili-Yan-Ing', NULL, NULL, NULL, 17, NULL, 1, '2024-08-03 14:36:23', 1, '2024-07-29 10:33:38', 0),
(9, 'Alok Misra', NULL, 'CEO of the Microfinance Insitutions Network', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(5).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Alok-Misra', NULL, NULL, NULL, 9, NULL, 1, '2024-07-29 10:51:08', 1, '2024-07-29 10:36:13', 0),
(10, 'AKM Saiful Majid', NULL, 'Chairman of Grameen Bank', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(6).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'AKM-Saiful-Majid', NULL, NULL, NULL, 10, NULL, 1, '2024-07-29 12:42:47', 1, '2024-07-29 11:07:13', 0),
(11, 'Allan Robert I. Sicat', NULL, 'Executive Director, Microfinance Council of the Philippines', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(7)1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Allan-Robert-I-Sicat', NULL, NULL, NULL, 8, NULL, 1, '2024-08-03 14:09:07', 1, '2024-07-29 11:28:06', 0),
(12, 'Bady Baldé', NULL, 'Deputy Executive Director of the Extractive Industry Transparency Initiative', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(9)1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Bady-Baldé', NULL, NULL, NULL, 8, NULL, 1, '2024-08-03 14:59:42', 1, '2024-07-29 11:56:24', 0),
(13, 'Heather Lynn Taylor Strauss', NULL, 'Economic Affairs Officer of UNESCAP', NULL, '', NULL, '13.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Heather-Lynn-Taylor-Strauss', NULL, NULL, NULL, 25, NULL, 1, '2024-08-03 14:36:53', 1, '2024-07-29 12:41:01', 0),
(14, 'Shunta Yamaguchi', NULL, 'Policy Analyst of the Environment and Economy Integration Division, OECD Environment Directorate', NULL, '', NULL, '161.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Shunta-Yamaguchi', NULL, NULL, NULL, 27, NULL, 1, '2024-08-03 14:06:06', 1, '2024-07-29 12:47:58', 0),
(3, 'Suharso Monoarfa', NULL, 'Minister of National and Development Planning, Republic of Indonesia', NULL, '', NULL, '3.png', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Suharso-Monoarfa', NULL, NULL, NULL, 3, NULL, 1, '2024-07-10 14:15:06', 999, '2024-07-08 20:46:14', 0),
(345, 'Arifin Tasrif', NULL, 'Minister of Energy and Mineral Resources, Republic of Indonesia', NULL, '', NULL, '231.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Arifin-Tasrif', NULL, NULL, NULL, 7, NULL, 1, '2024-08-02 16:12:51', 1, '2024-08-01 17:00:56', 0),
(346, 'Adnan Mazarei', NULL, 'Nonresident Senior Felow of Peterson Institute for International Economic', NULL, '', NULL, '252.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Adnan-Mazarei', NULL, NULL, NULL, 16, NULL, 1, '2024-08-01 21:49:50', 1, '2024-08-01 17:15:25', 0),
(347, 'Almo Pradana', NULL, ' Director Climate, Energy, Cities, and the Ocean of World Resource Institute Indonesia', NULL, '', NULL, '261.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Almo-Pradana', NULL, NULL, NULL, 15, NULL, 1, '2024-08-03 14:31:38', 1, '2024-08-01 17:24:22', 0),
(348, 'Riza Damanik', NULL, 'Chairman of the Board of Supervisors of Indonesia Traditional Fisheries Union', NULL, '', NULL, '241.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Riza-Damanik', NULL, NULL, NULL, 11, NULL, 1, '2024-08-03 14:16:23', 1, '2024-08-01 17:27:06', 0),
(349, 'Aria Widyanto', NULL, 'Chief of Risk & Sustainability Officer of Amartha', NULL, '', NULL, '17.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Aria-Widyanto', NULL, NULL, NULL, 12, NULL, 1, '2024-08-03 14:22:03', 1, '2024-08-01 22:02:39', 0),
(350, 'Hendrique Pacini', NULL, 'Economic Affairs Officer, UNCTAD', NULL, '', NULL, '18.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Hendrique-Pacini', NULL, NULL, NULL, 20, NULL, 1, '2024-08-01 22:03:00', 1, '2024-08-01 22:03:00', 0),
(351, 'Bambang P.S. Brodjonegoro', NULL, 'Former Minister of National Development Planning, Republic of Indonesia', NULL, '', NULL, '28.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Bambang-PS-Brodjonegoro', NULL, NULL, NULL, 6, NULL, 1, '2024-08-03 14:13:43', 1, '2024-08-01 22:20:55', 0),
(352, 'Nardos Bekele-Thomas', NULL, 'CEO & Director of the Micro Finance Network, AUDA NEPAD', NULL, '', NULL, '29.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Nardos-Bekele-Thomas', NULL, NULL, NULL, 9, NULL, 1, '2024-08-03 14:19:16', 1, '2024-08-01 22:23:29', 0),
(353, 'Teten Masduki', NULL, 'Minister of Cooperatives and Small and Medium Enterprises, Republic of Indonesia', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(13).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Teten-Masduki', NULL, NULL, NULL, 4, NULL, 1, '2024-08-03 14:04:49', 1, '2024-08-02 15:27:46', 0),
(354, 'Yogie Arry', NULL, 'Founder Berikan Protein Initiative', NULL, '', NULL, 'Photo_Frame_HLF_MSP3.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Yogie-Arry', NULL, NULL, NULL, 9, NULL, 1, '2024-08-03 14:27:02', 1, '2024-08-02 16:31:01', 0),
(355, 'Thomas Mangieri', NULL, 'Policy Specialist Panel, Quadrant Strategies', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(1).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Thomas-Mangieri', NULL, NULL, NULL, 25, NULL, 1, '2024-08-02 16:37:33', 1, '2024-08-02 16:37:33', 0),
(356, 'Erik Wijkström', NULL, 'Head of Technical Barriers to Trade in the WTO Trade and Environment Division', NULL, '', NULL, '333.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Erik-Wijkström', NULL, NULL, NULL, 14, NULL, 1, '2024-08-03 14:38:13', 1, '2024-08-03 13:52:03', 0),
(357, 'Kim Eric Bettcher', NULL, 'Director for Policy and Program Learning of Center for International Private Enterprises (CIPE)', NULL, '', NULL, '341.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Kim-Eric-Bettcher', NULL, NULL, NULL, 15, NULL, 1, '2024-08-03 14:32:45', 1, '2024-08-03 13:53:40', 0),
(358, 'ß', NULL, 'testesttest', NULL, '', NULL, 'Feels_good_man.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'ß', NULL, NULL, NULL, 28, NULL, 1, '2024-08-03 15:04:15', 1, '2024-08-03 14:43:36', 0),
(359, 'test for deletion', NULL, 'asdasdasdasdasd', NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'test-for-deletion', NULL, NULL, NULL, 29, NULL, 1, '2024-08-03 15:04:27', 1, '2024-08-03 15:04:27', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_member`
--

CREATE TABLE `kg_member` (
  `id` int(11) NOT NULL,
  `id_parents` int(11) DEFAULT NULL,
  `reg_no` varchar(255) DEFAULT NULL,
  `type_reg` tinyint(4) DEFAULT 0,
  `type_reg2` tinyint(4) DEFAULT 0,
  `id_hotel` tinyint(4) DEFAULT NULL,
  `bio` longtext DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `certname` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `dob` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alt_email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `hp` varchar(100) NOT NULL,
  `id_country` int(11) NOT NULL,
  `institusi` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL COMMENT 'posisi\r\n',
  `passport_type` varchar(255) DEFAULT NULL,
  `visa_type` varchar(255) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `passport_exp` date DEFAULT NULL,
  `passport_place` varchar(255) DEFAULT NULL,
  `kewarganegaraan` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `surat_tugas` varchar(255) DEFAULT NULL,
  `dietary` text DEFAULT NULL,
  `stay_start` date DEFAULT NULL,
  `stay_end` date DEFAULT NULL,
  `is_active` enum('Active','InActive') NOT NULL DEFAULT 'InActive',
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `create_user_id` int(11) NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_member`
--

INSERT INTO `kg_member` (`id`, `id_parents`, `reg_no`, `type_reg`, `type_reg2`, `id_hotel`, `bio`, `nik`, `firstname`, `lastname`, `certname`, `gender`, `dob`, `email`, `alt_email`, `password`, `hp`, `id_country`, `institusi`, `designation`, `passport_type`, `visa_type`, `passport`, `passport_exp`, `passport_place`, `kewarganegaraan`, `photo`, `ktp`, `surat_tugas`, `dietary`, `stay_start`, `stay_end`, `is_active`, `last_login`, `last_logout`, `modify_date`, `modify_user_id`, `create_date`, `create_user_id`, `uid`, `is_delete`) VALUES
(1, NULL, NULL, 12, 0, NULL, 'test bio saya', NULL, 'Mazhters', 'Irwan', NULL, 'Male', '1984-04-16', 'mazh.irwansyah@gmail.com', NULL, 'd4750ebbd4454e243f29d061a923ae37', '085691031324', 103, 'Komunigrafik', 'Tenaga Ahli', '', NULL, '0', '2024-01-01', '', 'Indonesia', 'f214f78cf9b4a973ffd6a15e157cc5c3.png', '44f6686451466a830ee174d2a990a625.png', '', 'No', NULL, NULL, 'Active', '2024-07-26 09:58:46', '2024-07-26 10:01:16', '2024-07-25 14:47:05', 1, '2024-07-23 09:35:06', 0, '2232821ea04f77513127e41eb88c4311', 0),
(2, NULL, NULL, 8, 0, NULL, '<p>Test bio</p>\r\n', NULL, 'John', 'Doe', NULL, 'Male', '2000-03-10', 'chodaminsane@gmail.com', NULL, '2399eaae3fa362f3305865390b08d0c1', '085161612223', 231, 'Komunigrafik', 'Indonesia', 'Regular', NULL, '0', '2024-01-01', 'USA', 'Indonesia', 'b594e37cd3268a384dcf24f07188013b.jpg', '3e2e54d89f4ed808453df3e35f5d8753.jpg', NULL, 'Sea Foods', NULL, NULL, 'InActive', '2024-07-23 10:45:43', NULL, '2024-07-26 07:59:46', 1, '2024-07-23 10:37:08', 0, 'b9af6d0dae2b7c9d0bb679d30e6c8ea8', 0),
(3, NULL, NULL, 8, 2, NULL, '3', NULL, 'Smith', 'Smith', NULL, 'Male', '2024-07-31', 'netsparker@example.com', NULL, 'd4a896c20ccf52235b2bc6fcd6b53fa3', '3', 103, '3', '3', '3', '3', '3', '2024-07-31', '103', '103', 'c7188286d687ec3e13e626beb7131400.JPG', '456a43c0ae6242d1cc2137e777d66efb.jpg', NULL, '3', '0000-00-00', '0000-00-00', 'Active', NULL, NULL, '2024-08-01 08:32:28', 1, '2024-07-23 17:14:11', 0, '1d170573827489952c6d57db005f3803', 0),
(4, NULL, NULL, 9, 0, NULL, NULL, NULL, 'Theodorus', 'Agustinus Hasiholan', NULL, 'Male', '1930-01-01', 'hasiholan21@gmail.com', NULL, '600ca8f056aa959b8b6fbab27af6a315', '083876674911', 103, 'Open Government Indonesia', 'xx', '', NULL, '', '2024-01-01', '', 'xxx', '03434b31082abc2ff9aab443760a850c.jpg', 'cb83e4e54c772f2c3810965457c6800f.jpg', NULL, 'x', NULL, NULL, 'Active', '2024-07-25 16:18:24', '2024-07-25 16:26:26', '2024-08-01 04:40:47', 1, '2024-07-25 10:56:54', 0, 'b1cd57c3265a459a3fac118bf3db2714', 0),
(5, NULL, NULL, 7, 0, NULL, NULL, NULL, 'maharani', 'wibowo', NULL, 'Female', '1986-11-26', 'maharani.wibowo@gmail.com', NULL, '391840b7df87b38aba6d3e4b30577f2e', '081311335611', 103, 'Bappenas', 'Director', '', NULL, '', '2024-01-01', '', 'Indonesia', '17cd5db0a82f6a4f41d79bd043668c1d.jpeg', '049f337c858f775911d9ba2f909ecdcb.jpeg', NULL, 'halal food', NULL, NULL, 'InActive', NULL, NULL, '2024-07-25 11:50:07', 0, '2024-07-25 11:50:07', 0, '96133820e3e2c3009c5bb0663306dab1', 0),
(6, NULL, NULL, 9, 0, NULL, '', NULL, 'SALMAN', 'SENO', NULL, 'Male', '1999-11-26', 'salmanrasyad10@gmail.com', NULL, '2cf107bd6f184fad1bcfb590a9e0d3a3', '08119998945', 103, 'Bappenas', 'Staff', '', '', '', '2024-01-01', '1', '1', 'f6da2090de3a13bca7509ae02a76987a.jpg', '5c7d074e7de3e16b0b655922d90b1bc5.png', NULL, 'None', '0000-00-00', '0000-00-00', 'InActive', '2024-07-25 16:00:16', '2024-07-25 16:16:21', '2024-07-29 22:01:21', 1, '2024-07-25 11:55:55', 0, 'cbd4480f48c191007d1b0d93c0c019d1', 0),
(7, NULL, NULL, 7, 0, NULL, '', NULL, 'SALMAN', 'SENO', NULL, 'Male', '1999-11-26', 'salmanrasyad10@gmail.com', NULL, '974fdef7c610fd5dad14caecacc406f3', '08119998945', 103, 'President of Indonesia', 'President', '', '', '', '2024-01-01', '1', '1', '4a6e823b81490d01f5c061bc834b827b.jpg', 'a558d7a3bb0e8d79969773e6843ae895.png', NULL, 'Vegetarian', '0000-00-00', '0000-00-00', 'InActive', '2024-07-25 17:46:05', '2024-07-25 12:18:09', '2024-07-26 22:26:36', 1, '2024-07-25 12:09:00', 0, 'd6c72ae0269fffc73bfb4ef2c22566f8', 1),
(8, NULL, NULL, 10, 0, NULL, '', NULL, 'SALMAN', 'SENO', NULL, 'Male', '1999-11-26', 'salmanrasyad10@gmail.com', NULL, '8ccce6b22df85fc96d865bd6cc07d4a1', '08119998945', 211, 'UNCTAD', 'Director', 'Service', NULL, '123456789', '2028-01-01', 'Geneva', 'Swizterland', '9bc4b34bbce06ebe3b8e56a2250797de.jpg', 'd8db5b88233af26e065c62cb89254299.png', NULL, 'Kosher', NULL, NULL, 'InActive', '2024-07-25 12:36:38', '2024-07-25 12:45:36', '2024-07-25 17:12:12', 1, '2024-07-25 12:34:58', 0, 'd2a9be9f2f6587087735258899b8858b', 0),
(9, NULL, NULL, 11, 0, NULL, '', NULL, 'SALMAN', 'SENO', NULL, 'Male', '1999-11-26', 'salmanrasyad10@gmail.com', NULL, '2e0d89e825b1535fca02c41f0b05d1ce', '08119998945', 103, 'INFID', 'Director', '', NULL, '', '2024-01-01', '', 'Indonesian', '3a3cccdec4a747440065a6737d54decf.jpg', '33014a98756e952894a594bfb7fd8524.png', NULL, 'None', NULL, NULL, 'InActive', '2024-07-25 17:00:46', '2024-07-25 17:02:09', '2024-07-25 16:57:01', 1, '2024-07-25 12:51:13', 0, '9aea9e2df35eb0a97dfce375a92735ac', 0),
(10, NULL, NULL, 12, 0, NULL, '', NULL, 'SALMAN', 'SENO', NULL, 'Male', '1999-11-26', 'salmanrasyad10@gmail.com', NULL, 'eb19833f4132f07c377cf2d05b00029f', '08119998945', 103, 'Yakkum', 'Staff', '', NULL, '', '2024-01-01', '', 'Indonesia', '356cf3e24a32d11dca2cfa1e6a3905d7.jpg', '3d053274a223c2d23221b99eee895dc3.png', NULL, 'None', NULL, NULL, 'InActive', '2024-07-25 13:04:43', '2024-07-25 13:55:25', '2024-07-25 16:57:24', 1, '2024-07-25 13:03:08', 0, 'e464c0f72601520defa0e64ea1459aa6', 0),
(11, NULL, NULL, 7, 0, NULL, '', NULL, 'Muhammad', 'Irwansyah', NULL, 'Male', '1984-04-16', 'irwansyah@komunigrafik.com', NULL, 'd05cb41540a5950d8c0504fcc77485ad', '62 85311888331', 103, 'PT Penyedia Konten Kreatif', 'Delegate', 'Visa', NULL, '1535153135', '2025-01-01', 'Jakarta', '103', 'ad99bb72e838b1c2419ecbc961f2e71f.png', 'c7fe81e9a93e92637bdd1c55135908a0.jpg', '', 'Halal', NULL, NULL, 'Active', NULL, NULL, '2024-07-25 15:02:52', 1, '2024-07-25 15:02:23', 0, '5fa5efac1aa198d7d0b836433c43bb0b', 0),
(12, NULL, NULL, 7, 0, NULL, '', NULL, 'Rasyad', 'Salman', NULL, 'Male', '1990-01-01', 'salmanrasyad10@gmail.com', NULL, 'f29b4e6e849ab969d0fa4630471c0ef2', '62 8111111111', 103, 'President of Indonesia', 'President', 'Diplomatic', NULL, '123456789', '2030-01-01', 'Jakarta', '103', '2ef0e4d5cee26ec43d9b6b4c642ec356.png', '3019cd313dd5743268a12dff86fdadf8.png', '', 'Halal', NULL, NULL, 'Active', '2024-07-25 16:16:46', '2024-07-25 17:00:12', '2024-07-25 16:47:44', 1, '2024-07-25 15:57:09', 0, '9a8e973db867748e1eefda6f82412ba6', 0),
(13, NULL, NULL, 7, 0, NULL, '', NULL, 'Hasiholan', 'Hasiholan', NULL, 'Male', '1984-06-01', 'hasiholan21@gmail.com', NULL, '7f691b34f6c52805df4e2ca8410ee9b9', '62 83876674911', 103, 'Bappenas', 'Umbi', 'Reguler', NULL, '1123131', '2024-01-01', 'Jakarta', '103', '83a52960737bb24935aceb2fe2563502.jpg', '06e44f71848a481ac9885a432992f719.jpg', '5cf812f3901805d6f6ea5ccfa08e1d0e.pdf', 'Nuts', NULL, NULL, 'Active', '2024-07-25 18:07:34', '2024-07-25 18:06:55', '2024-07-25 16:32:39', 1, '2024-07-25 16:29:34', 0, '547bc2fde962f95ee329fc08d80853d3', 0),
(14, NULL, NULL, 0, 0, NULL, 'Ini profile bio saya', NULL, 'Irwansyah Test', '', NULL, 'Male', '', 'mazh.irwansyah@gmail.com', NULL, '5eae7dcacf5fbc07878c2b7a277ec769', '', 0, 'Institusi', 'Desig', NULL, NULL, NULL, NULL, NULL, NULL, '5944468a192c5d9d9580d49100a74a96.png', NULL, NULL, NULL, NULL, NULL, 'InActive', '2024-07-26 09:16:58', '2024-07-26 09:44:17', NULL, 0, '2024-07-26 08:36:51', 0, '0cacca0332468309ae4d1923afebe61b', 0),
(15, NULL, NULL, 7, 0, NULL, '<p>xxxxxxxxxxxxxxxxxxxxxx</p>\r\n', NULL, 'Theodorus Agustinus', 'Hasiholan', NULL, 'Male', '1930-01-01', 'hasiholan21@gmail.com', NULL, '4a8b09dc3d28d940fbe25260fbef7c09', '62 123456789', 103, 'Bappenas', 'Staff', 'General', NULL, '123456789', '2032-01-01', 'Indonesia', '103', 'd89a1c897a86fda97c5d642031177155.jpg', '639c04b3c3bc1a0f85f1de96545c7e3f.jpg', '', 'Halal', NULL, NULL, 'Active', '2024-07-26 08:05:40', '2024-07-26 09:45:01', '2024-07-26 08:21:45', 1, '2024-07-26 08:19:39', 0, 'f49939018d57c6fac193a5337fa9a671', 0),
(16, NULL, NULL, 0, 0, NULL, NULL, NULL, 'adit', '', NULL, 'Male', '', 'adit123@gmail.com', NULL, '8b00f6bb377fab49370b6f4edfc6ea5b', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'InActive', NULL, NULL, NULL, 0, '2024-07-26 08:36:51', 0, '10bc0b65b0e2c34ee9e103fbe8efaf59', 0),
(17, NULL, NULL, 0, 0, NULL, 'Aditya', NULL, 'adit', '', NULL, 'Male', '', 'aditya123@gmail.com', NULL, 'ca3d2119c2d2f7dab6909105ef9fb530', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6f660c74eaec1f05b6560a99e4f7e48a.jpg', NULL, NULL, NULL, NULL, NULL, 'InActive', '2024-07-26 08:32:01', '2024-07-26 08:37:23', NULL, 0, '2024-07-26 08:36:51', 0, 'd0f9d4a40dd40e8bf6d5f0a92c7bb750', 0),
(18, NULL, NULL, 9, 0, NULL, '', NULL, 'Sri', 'Murti', NULL, 'Female', '1930-01-01', 'farin.asfarina@gmail.com', NULL, 'd6d2e8a099aead24358226c331af8409', '93 82133947744', 22, 'Bapp', 'Stap', 'Services', '', 'BB8801e473', '2024-01-01', '2', '22', '534f388b04bed3eaa564bace1f41a42f.png', '2f08a347936a8f8a71343cc59a9f94ce.png', '', 'No Restrictions', NULL, NULL, 'Active', '2024-08-03 11:57:17', '2024-08-03 12:05:08', '2024-08-02 17:24:38', 1, '2024-07-26 09:11:14', 0, '080cf4edc8a1aa3b460dfe7931b28bf1', 0),
(19, NULL, NULL, 7, 0, NULL, '<p>Im a junior planner of Bappenas</p>\r\n', NULL, 'Salman', '', NULL, 'Male', '', 'salmanrasyad10@gmail.com', NULL, '6783abcfa356b81d0667c827329b5150', '', 1, '', '', '', NULL, '', '2024-07-26', '', '', '4e2a360701bc66c92ce2665dc04643ee.jpg', NULL, NULL, '', NULL, NULL, 'Active', '2024-07-26 09:04:33', '2024-07-26 09:48:26', '2024-07-30 16:38:39', 1, '2024-07-26 09:03:18', 0, 'f900b79fd5a378c44a9c2533bf15ef01', 0),
(20, NULL, NULL, 9, 12, NULL, NULL, NULL, 'Theodorus Agustinus', '', NULL, 'Male', '', 'hasiholan21@gmail.com', NULL, 'd0f9e01c98b82717f890e8de00d426bb', '', 0, 'Bappenas', 'Staff', NULL, NULL, NULL, NULL, NULL, NULL, '67df2981557a255ca2adf111e415c593.png', NULL, NULL, NULL, NULL, NULL, 'InActive', '2024-07-26 09:12:35', '2024-07-26 10:11:11', NULL, 0, '2024-07-26 09:09:17', 0, 'bc5acfbf7397252d4cf6ba61ce1eb19e', 0),
(21, NULL, NULL, 7, 12, NULL, '123456', NULL, 'Theodorus Agustinus', '', NULL, 'Male', '', 'hasiholan221@gmail.com', NULL, '4a8b09dc3d28d940fbe25260fbef7c09', '', 0, 'xxx', 'xxx', NULL, NULL, NULL, NULL, NULL, NULL, '3b70a51a472f18de39ae617d7c6e2e97.jpg', NULL, NULL, NULL, NULL, NULL, 'Active', '2024-07-26 11:12:20', '2024-07-26 12:31:52', '2024-07-26 11:01:05', 1, '2024-07-26 09:46:44', 0, '10e08a70a2691ec1e660350fef8b580c', 0),
(22, NULL, NULL, 13, 12, NULL, NULL, NULL, 'Takashi ', '', NULL, 'Male', '', 'salmanrasyad10@gmail.com', NULL, '4403f096f443eb5992312b70ac662518', '', 0, 'UNWRO', 'Staff', NULL, NULL, NULL, NULL, NULL, NULL, '76a5bc7a6cb6aed04e1b704bd7078794.jpg', NULL, NULL, NULL, NULL, NULL, 'InActive', '2024-07-26 09:54:50', '2024-07-26 09:55:32', NULL, 0, '2024-07-26 09:51:43', 0, 'b8ee5f96130deb1cc5fa342eab4e023c', 0),
(23, NULL, NULL, 15, 12, NULL, NULL, NULL, 'Slamet Riyanto', '', NULL, 'Male', '', 'salman.seno@support.bappenas.go.id', NULL, 'd0f9e01c98b82717f890e8de00d426bb', '', 0, 'KADIN', 'Staff', NULL, NULL, NULL, NULL, NULL, NULL, '7753de06c422b28530edcb43cac97e8c.png', NULL, NULL, NULL, NULL, NULL, 'InActive', '2024-07-26 09:58:36', '2024-07-26 10:03:29', NULL, 0, '2024-07-26 09:58:05', 0, '01b358ee4548bccd00c46db5642b1233', 0),
(24, NULL, NULL, 9, 12, NULL, 'Policy Analyst Specialist', NULL, 'Imam Gunadi', '', NULL, 'Male', '', 'salman.seno@support.bappenas.go.id', NULL, '0f34f44e1543605cab572bb0d50f4726', '', 1, 'Bappenas', 'Staff', '', NULL, '', '2024-07-26', '', '', 'cb9e070945b29395d83f94fc1041500d.jpg', NULL, NULL, '', NULL, NULL, 'Active', '2024-07-26 10:09:05', '2024-07-26 11:04:38', '2024-07-26 10:06:08', 1, '2024-07-26 10:05:07', 0, 'd6d718e07746fe1cd866ad59c2e6198b', 0),
(25, NULL, NULL, 9, 12, NULL, NULL, NULL, 'maharani', '', NULL, 'Male', '', 'maharani.wibowo@gmail.com', NULL, 'd0f9e01c98b82717f890e8de00d426bb', '', 0, 'Bappenas', 'Staff', NULL, NULL, NULL, NULL, NULL, NULL, 'b86adac04670d235a07d075ad3368a88.jpg', NULL, NULL, NULL, NULL, NULL, 'Active', '2024-07-26 12:32:03', NULL, '2024-07-26 12:30:44', 1, '2024-07-26 10:12:32', 0, 'b170339d364740d314f95cb002eb1bd5', 0),
(27, NULL, NULL, 13, 12, NULL, NULL, NULL, 'Irwansyah Test', '', NULL, 'Male', '', 'mazh.irwansyah@gmail.com', NULL, 'c0ad7c50e6f2087eff2af22aeebc3e3f', '', 0, 'PT Penyedia Konten Kreatif', 'Delegate', NULL, NULL, NULL, NULL, NULL, NULL, '76451182f371831a516d77a9f256345a.png', NULL, NULL, NULL, NULL, NULL, 'Active', '2024-07-26 10:59:34', NULL, '2024-07-26 10:57:14', 1, '2024-07-26 10:56:58', 0, '4b6b7b904282e9feaf83e8a7b1056814', 0),
(28, NULL, NULL, 7, 12, NULL, NULL, NULL, 'Theodorus Agustinus', '', NULL, 'Male', '', 'hasiholan21@gmail.com', NULL, 'd0f9e01c98b82717f890e8de00d426bb', '', 0, 'xxx', 'xxxx', NULL, NULL, NULL, NULL, NULL, NULL, '088a6e3775a1d42eb395bbf12259549c.jpg', NULL, NULL, NULL, NULL, NULL, 'InActive', NULL, NULL, NULL, 0, '2024-07-26 11:00:22', 0, '784f0d51113042ee76065bf13e526edc', 0),
(29, NULL, NULL, 8, 12, NULL, '', NULL, 'Kim Jong Un', '', NULL, 'Male', '', 'salman.seno@support.bappenas.go.id', NULL, '987b2e016cc5f3b43e3681dada4c4f86', '', 1, 'North Korea', 'Minister', '', NULL, '', '2024-07-26', '', '', 'b5b2d0aad4e679a292321b5d3d09510f.jpg', NULL, NULL, '', NULL, NULL, 'Active', '2024-08-01 08:57:52', '2024-07-26 12:25:20', '2024-07-26 11:13:27', 1, '2024-07-26 11:12:42', 0, '76193efbea1847ec714fa8b40fe405d4', 0),
(30, NULL, NULL, 13, 10, NULL, '', NULL, 'Hillary ', 'Clinton', NULL, 'Female', '1930-01-01', 'salman.seno@support.bappenas.go.id', NULL, '723a730aa8744c673d85b631975fca34', '1 11111111111', 231, 'USAID', 'Director', 'Diplomatic', NULL, '11111111111', '2024-01-01', '231', '231', 'b6b8f6224e06945408af70278afba4d2.jpg', 'f70a059b646e6217c842cfbc7168481e.png', '', 'No Restrictions', NULL, NULL, 'Active', '2024-07-26 12:43:38', '2024-07-26 14:00:55', '2024-07-26 12:55:13', 1, '2024-07-26 12:50:33', 0, '905953300b51e822d9f5c285fb8ffb9d', 0),
(31, NULL, NULL, 7, 12, NULL, '', NULL, 'Kamala', 'Harris', NULL, 'Male', '1970-01-01', 'salman.seno@support.bappenas.go.id', NULL, '3670c1bc688a147b5f1f097bebce8440', '1 11111111111', 231, 'US Goovernment', 'President', 'Diplomatic dan Offcial', NULL, '11111111111', '2026-01-01', '231', '231', 'b4730b3e3c62fe83a91fe51e026f5e9c.jpg', 'cc370d802ae9baab946335cba79e8a5b.png', NULL, 'No Restrictions', '2024-09-01', '2024-09-03', 'Active', '2024-07-26 14:04:21', NULL, '2024-07-30 16:49:00', 1, '2024-07-26 14:10:46', 0, '299f4ae61f4b47a7e0ca35007a9b4d76', 0),
(32, NULL, NULL, 9, 12, NULL, '', NULL, 'Sri', 'Murti', NULL, 'Female', '1970-01-01', 'farin.asfarina@gmail.com', NULL, 'd6d2e8a099aead24358226c331af8409', '93 8888883333', 16, 'Bapp', 'Stap', 'Reguler passport', 'Visa Exemption', 'BB88013', '2024-01-01', '15', '6', 'ce95fe6bab1e2a0bef57ed228a46ba71.png', 'd03bf1043f56a40940996d96c239e9da.pdf', NULL, 'No Restrictions', '2024-09-01', '2024-09-03', 'Active', '2024-08-02 16:53:46', '2024-08-02 16:53:53', '2024-07-30 16:26:30', 1, '2024-07-30 16:25:53', 0, 'aa8ecf23f8e1d138df7b8036077256c8', 0),
(33, NULL, NULL, 9, 12, NULL, NULL, NULL, 'niwa', 'dwitama', NULL, 'Male', '', 'niwadwitama@gmail.com', NULL, '262c0ab66a50f1ebb9dd699dd34ae62b', '', 0, 'indonesia mission to UN in Geneva', 'Mr', NULL, NULL, NULL, NULL, NULL, NULL, '4b4ecb4b8d7acaf9dbdb72064f57c844.jpeg', NULL, NULL, NULL, NULL, NULL, 'InActive', NULL, NULL, NULL, 0, '2024-07-27 17:15:47', 0, '5f88565640005324a2c1258da588fb9c', 0),
(34, NULL, NULL, 14, 12, NULL, NULL, NULL, 'Andrew William John', 'Nathaniel', NULL, 'Male', '', 'secretarygeneralaman@amangroupid.com', NULL, '0f3f201d6e2b6af810d09579ddff0eb4', '', 0, 'Anak Muda Amankan Nusantara (AMAN)', 'Secretary General', NULL, NULL, NULL, NULL, NULL, NULL, 'c05e5e131c2e456309823b14826c5180.jpg', NULL, NULL, NULL, NULL, NULL, 'InActive', NULL, NULL, NULL, 0, '2024-07-27 21:11:16', 0, '935042bfcaf118e47187bb12a6af6cbb', 0),
(35, NULL, NULL, 7, 12, NULL, '<p>Aku Keren</p>\r\n', NULL, 'Agus', 'Harimur', NULL, 'Male', '2000-04-17', 'sekretariat.ogi@bappenas.go.id', NULL, 'd0f9e01c98b82717f890e8de00d426bb', '244 000000', 15, 'PKI', 'Direktur Eksekutif', 'Services passport', 'E-Visa', '00000', '2037-04-09', '76', '7', '63c75b0a93f3226b48117dea853b1658.png', 'c949f6704465e9597de151661a8b24b4.pdf', NULL, 'Gluten Free', '2024-09-16', '2024-09-03', 'Active', '2024-07-29 22:00:35', NULL, '2024-07-31 13:57:15', 1, '2024-07-29 22:33:14', 0, 'fb54456357743b6c14e8054292116689', 0),
(36, NULL, NULL, 14, 12, NULL, NULL, NULL, 'John Doe', 'Junior', NULL, 'Male', '', 'chodammail@gmail.com', NULL, '6b10d52df7f43fa799fece4008865e78', '', 0, 'PT.Indonesia', 'Indonesia', NULL, NULL, NULL, NULL, NULL, NULL, '52dacf167e5cfd1cc496423faf4c5c0d.jpg', NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, '2024-08-01 14:46:44', 1, '2024-07-30 11:25:59', 0, 'a0ea182bcca6280a80ef0e5858b4450d', 0),
(37, NULL, NULL, 14, 12, NULL, NULL, NULL, 'Sarah', 'Hayton', NULL, 'Male', '', 'shayton@eiti.org', NULL, '1f6a04d2cc00e848ec5be84ecdf84a6d', '', 0, 'EITI', 'Ms', NULL, NULL, NULL, NULL, NULL, NULL, '00e9dd1551d560b797b44dbdcf2d21d0.jpg', NULL, NULL, NULL, NULL, NULL, 'InActive', NULL, NULL, NULL, 0, '2024-07-30 21:42:11', 0, 'cd2959932b9a47eb95f4d6cbb06efd10', 0),
(38, NULL, NULL, 9, 12, NULL, '1&quot;&gt;&lt;img src=x onerror=alert(1)&gt;', NULL, 'oke&quot;&gt;&lt;img src=x onerror=alert(1)&gt;', 'ya', NULL, 'Male', '', 'redte4mm@gmail.com', NULL, '778554cb5476f256a856caaa180cabe8', '', 0, 'aa', 'aa', NULL, NULL, NULL, NULL, NULL, NULL, 'c6d7c8f46767b9d680a8a893377c2670.jpeg', NULL, NULL, NULL, NULL, NULL, 'Active', '2024-08-04 07:43:22', NULL, '2024-08-03 21:27:12', 1, '2024-07-30 23:33:41', 0, '7f13fef3df73d9862560727ae77d0f67', 0),
(64, NULL, NULL, 9, 12, NULL, NULL, NULL, 'tes&lt;img src=x onerror=alert(1)&gt;', 'tes&lt;img src=x onerror=alert(2)&gt;', NULL, 'Male', '', 'oyisam@yopmail.com', NULL, '778554cb5476f256a856caaa180cabe8', '', 0, 'tes&lt;img src=x onerror=alert(3)&gt;', 'tes&lt;img src=x onerror=alert(4)&gt;', NULL, NULL, NULL, NULL, NULL, NULL, 'a95ba98a59da92307316c513204fd985.jpeg', NULL, NULL, NULL, NULL, NULL, 'InActive', NULL, NULL, NULL, 0, '2024-08-03 21:16:06', 0, '625723e97c0318edeb2392bd7f273b87', 0),
(40, NULL, NULL, 8, 12, NULL, NULL, NULL, 'coba', 'coba', NULL, 'Male', '', 'coba@gmail.com', NULL, 'd0f9e01c98b82717f890e8de00d426bb', '', 0, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 'f82b6688719ab2093049aabcdd75ccc0.jpg', NULL, NULL, NULL, NULL, NULL, 'InActive', NULL, NULL, NULL, 0, '2024-07-31 10:19:54', 0, '0027fa629521558cc976aab0a762b6d1', 0),
(41, NULL, NULL, 1, 1, NULL, NULL, NULL, 'VVIP', 'Register', NULL, 'Male', '1998-08-18', 'ahmadjaelaninurdin1@gmail.com', NULL, 'd0f9e01c98b82717f890e8de00d426bb', '62 85218880049', 103, 'Tes', 'TES', 'Reguler passport', 'Diplomatic dan Offcial', '010101101101110111', '2030-09-18', '103', '103', '2b1520c17e7a7bbda5b11c1145bf88a6.jpeg', '263b8246dcf5e068164035682c787065.jpeg', NULL, 'Halal', '2024-09-01', '2024-09-03', 'Active', '2024-07-31 13:54:20', '2024-07-31 15:51:24', '2024-07-31 14:15:23', 1, '2024-07-31 14:15:23', 0, 'a875a4597b759be090ef5d0dbf567d4b', 1),
(42, NULL, NULL, 1, 1, NULL, NULL, NULL, 'VVIP', 'Bypass', NULL, 'Male', '', 'ahmadjaelaninurdin1@gmail.com', NULL, 'd0f9e01c98b82717f890e8de00d426bb', '', 0, 'Tes', 'TES', NULL, NULL, NULL, NULL, NULL, NULL, 'a21ee7d6cdd7aa81390c4d1c84d09bb2.jpeg', NULL, NULL, NULL, NULL, NULL, 'InActive', NULL, NULL, NULL, 0, '2024-07-31 11:32:53', 0, 'a2fe1d0334ff19dc815375a3a85c6654', 0),
(43, NULL, NULL, 13, 12, NULL, NULL, NULL, 'test', 'test', NULL, 'Male', '', 'urhnrblpntstr@gmail.com', NULL, '6739f60cc46e0c16762ec63e6a6b9d43', '', 0, 'Test', 'Test', NULL, NULL, NULL, NULL, NULL, NULL, '4924028db98a07fea9db0da3ea2fc4ab.png', NULL, NULL, NULL, NULL, NULL, 'InActive', NULL, NULL, NULL, 0, '2024-07-31 11:38:56', 0, 'b3843cfdabba20f216a1400a772c8d94', 0),
(44, NULL, NULL, 7, 0, NULL, '<p><a href=\"http://evil.com\">test</a>test</p>\r\n', NULL, 'test', 'test', NULL, 'Male', '2026-04-28', 'test@gmail.com', NULL, '', '123', 103, 'asd', 'asd', 'test', 'asd', '123', '2026-01-28', '103', '103', '67733a9b40254cb860875afcf0c59ab7.pdf', '', NULL, 'asd', '0000-00-00', '0000-00-00', 'Active', NULL, NULL, '2024-07-31 14:05:07', 1, '2024-07-31 13:58:30', 1, '0dcac75a6e1b942c2166144728a7a8dc', 0),
(45, NULL, NULL, 13, 12, NULL, NULL, NULL, 'test', 'test', NULL, 'Male', '', 'test@gmail.com', NULL, '7877d1e96bec8ba24e1a60698fcc9a5c', '', 0, 'asd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, '08974444a5b03d01cca199e935df0244.png', NULL, NULL, NULL, NULL, NULL, 'InActive', NULL, NULL, NULL, 0, '2024-07-31 14:17:06', 0, '8298abe7c48fee20b80fbec4ea4b24e1', 0),
(46, NULL, NULL, 9, 12, NULL, NULL, NULL, 'asd', 'asd', NULL, 'Male', '', 'urhnrblpntstr@gmail.com', NULL, '7877d1e96bec8ba24e1a60698fcc9a5c', '', 0, 'asd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, 'c72ff11c28bfd8e9b47653fa2730734f.png', NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, '2024-07-31 14:32:15', 1, '2024-07-31 14:21:18', 0, 'ff17b9df18ee5a986684c1264c762002', 0),
(48, NULL, NULL, 1, 1, NULL, '<p>ls</p>\r\n', NULL, 'test', 'test', NULL, 'Male', '1970-01-01', 'rr@gmail.com', NULL, '7877d1e96bec8ba24e1a60698fcc9a5c', '355 123', 19, 'test', 'test', 'Services passport', 'Diplomatic dan Offcial', '123', '2024-01-01', '19', '20', '1fb6a5028f69755c299f83e64cc7e5ba.png', 'f2c922c38055de490ad427c8d8b7820c.pdf', NULL, 'Gluten Free', '2024-09-01', '2024-09-03', 'Active', '2024-08-01 08:17:38', '2024-08-01 08:18:10', '2024-08-01 08:10:54', 1, '2024-07-31 18:29:06', 0, 'f144413cc5bec098338b2df12dba7301', 0),
(66, NULL, NULL, 15, 12, NULL, NULL, NULL, 'Karyono', 'Putra', NULL, 'Male', '', 'yoyonputra0401@gmail.com', NULL, '388d53c0ad47601f75f57df2c8c2693b', '', 0, 'UMKM', 'UMKM Denpasar', NULL, NULL, NULL, NULL, NULL, NULL, 'ed7786917a91d3ec1889411eb71cc346.jpg', NULL, NULL, NULL, NULL, NULL, 'InActive', NULL, NULL, NULL, 0, '2024-08-04 18:57:59', 0, '7c15157749d0bf137085d3665149786e', 0),
(65, NULL, NULL, 15, 12, NULL, NULL, NULL, 'Dodi', 'Maikel', NULL, 'Male', '', 'dodiyusmaikel6512@gmail.com', NULL, '388d53c0ad47601f75f57df2c8c2693b', '', 0, 'UMKM', 'UMKM Denpasar', NULL, NULL, NULL, NULL, NULL, NULL, '297d5a94c928ca9effaab24ae61a8ff6.jpg', NULL, NULL, NULL, NULL, NULL, 'InActive', NULL, NULL, NULL, 0, '2024-08-04 18:41:17', 0, '6506e755de17e1f59f095616ff2e7e84', 0),
(61, NULL, NULL, 13, 12, NULL, NULL, NULL, 'coba2', 'coba2', NULL, 'Male', '', '1@gmail.com', NULL, 'd0f9e01c98b82717f890e8de00d426bb', '', 0, 'coba2', 'coba2', NULL, NULL, NULL, NULL, NULL, NULL, '7fc7f97a50faf7a9573bcbe8441c3c30.jpg', NULL, NULL, NULL, NULL, NULL, 'InActive', NULL, NULL, NULL, 0, '2024-08-01 04:46:39', 0, 'aae0262efd46ac65d7b1d5813b8b9984', 0),
(62, NULL, NULL, 14, 12, NULL, NULL, NULL, 'Andy', 'Dufresne', NULL, 'Male', '', 'chodammail@gmail.com', NULL, '6b10d52df7f43fa799fece4008865e78', '', 0, 'ABCD', 'ABCD', NULL, NULL, NULL, NULL, NULL, NULL, '910ebc00e5d552302689c4365c7ee403.jpg', NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, '2024-08-01 14:38:15', 1, '2024-08-01 14:36:21', 0, '13df411009fda52903f5d686a7898492', 0),
(63, NULL, NULL, 8, 12, NULL, NULL, NULL, 'Prof Kartika Meydina ', 'Damianti', NULL, 'Male', '', 'Kartikaanugerahcargo@gmail.com', NULL, '8d8099ea3a2a592e33e853292f395786', '', 0, 'PT KARTIKA ANUGERAH CARGO', 'CEO', NULL, NULL, NULL, NULL, NULL, NULL, '50f4b402c36d71292536ca3eb48f7ccb.jpeg', NULL, NULL, NULL, NULL, NULL, 'InActive', NULL, NULL, NULL, 0, '2024-08-03 12:47:07', 0, 'dd3531bf2dcf99c4b2cfacc93b25ce34', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_member_dao`
--

CREATE TABLE `kg_member_dao` (
  `id` int(11) NOT NULL,
  `id_parents` int(11) DEFAULT NULL,
  `reg_no` varchar(255) DEFAULT NULL,
  `type_reg` tinyint(4) DEFAULT 0,
  `type_reg2` tinyint(4) DEFAULT 0,
  `reg_type` tinyint(4) DEFAULT NULL,
  `bio` longtext DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `certname` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `pob` varchar(255) DEFAULT NULL,
  `dob` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alt_email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `hp` varchar(100) NOT NULL,
  `id_country` int(11) NOT NULL,
  `institusi` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL COMMENT 'posisi\r\n',
  `passport_type` varchar(255) DEFAULT NULL,
  `visa_type` varchar(255) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `passport_exp` date DEFAULT NULL,
  `passport_place` varchar(255) DEFAULT NULL,
  `kewarganegaraan` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `surat_tugas` varchar(255) DEFAULT NULL,
  `dietary` text DEFAULT NULL,
  `afn` varchar(255) DEFAULT NULL,
  `dfn` varchar(255) DEFAULT NULL,
  `stay_start` date DEFAULT NULL,
  `stay_end` date DEFAULT NULL,
  `hotel` varchar(255) DEFAULT NULL,
  `is_active` enum('Active','InActive') NOT NULL DEFAULT 'InActive',
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `create_user_id` int(11) NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `is_lock` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_member_dao`
--

INSERT INTO `kg_member_dao` (`id`, `id_parents`, `reg_no`, `type_reg`, `type_reg2`, `reg_type`, `bio`, `nik`, `prefix`, `firstname`, `lastname`, `certname`, `gender`, `pob`, `dob`, `email`, `alt_email`, `password`, `hp`, `id_country`, `institusi`, `designation`, `passport_type`, `visa_type`, `passport`, `passport_exp`, `passport_place`, `kewarganegaraan`, `photo`, `ktp`, `surat_tugas`, `dietary`, `afn`, `dfn`, `stay_start`, `stay_end`, `hotel`, `is_active`, `last_login`, `last_logout`, `modify_date`, `modify_user_id`, `create_date`, `create_user_id`, `uid`, `is_delete`, `is_lock`) VALUES
(1, NULL, NULL, 5, 0, NULL, '', NULL, NULL, 'Test', 'Akun', NULL, 'Male', NULL, '2024-08-02', 'mazhtersevents@gmail.com', 'daoakun', '5eae7dcacf5fbc07878c2b7a277ec769', '', 103, '', '', '', '', '', '2024-08-02', '103', '103', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, '2024-08-02 09:09:46', 1, '2024-08-02 09:09:46', 1, '30596bc51c415ed9090eddf462d15368', 0, 0),
(2, 1, NULL, 8, 12, NULL, NULL, NULL, NULL, 'Firstname', 'Lastname', NULL, 'Female', NULL, '1965-10-24', 'mazhtersevents@gmail.com', NULL, '', '355 768686867867', 114, 'organisasi', 'Designation', 'Services passport', 'Diplomatic dan Offcial', '324242342', '2024-01-01', '13', '17', 'e9017dca31b6e121cfac42aa34b94994.png', '37af204347a799a32d57a303ef584fbb.jpg', NULL, 'Halal', NULL, NULL, '2024-09-01', '2024-09-03', NULL, 'InActive', NULL, NULL, '2024-08-02 09:12:15', 0, '2024-08-02 09:12:15', 0, '539b5974865b03533a7263e4710d241a', 0, 0),
(3, 1, NULL, 8, 12, 4, NULL, NULL, 'Mr', 'dfvdfvfb', 'fbfdb', 'sdcscs', 'Male', 'dfvdfv', '1970-01-15', 'email@email.com', NULL, '', '1-684 45646464', 4, 'bfb', 'fgbf', 'Service passport', NULL, '23424', '2024-01-01', '15', '18', '377130fd9151153070681e6cd2b67106.jpg', 'c1fee385565d7468fb5d7d52da16425d.jpg', NULL, 'Gluten Free', '2342342', '23423423', '2024-09-01', '2024-09-03', 'dvdvdf', 'InActive', NULL, NULL, '2024-08-02 20:04:25', 0, '2024-08-02 20:04:25', 0, 'b3f66ace8bc6265d3ae58108ed09c8c9', 0, 0),
(4, NULL, NULL, 5, 0, NULL, '', NULL, NULL, 'Salman', 'Rasyad', NULL, 'Male', NULL, '2004-01-01', '', 'rasyad', 'b28d1f88a317954ff906221b60439b3a', '', 103, '', '', '', '', '', '2022-11-02', '103', '103', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, '2024-08-02 09:35:46', 1, '2024-08-02 09:34:40', 1, '157ba0e35fb3fae9d9683d21c1964c6c', 1, 0),
(5, NULL, NULL, 5, 0, NULL, '', NULL, NULL, 'SALMAN', 'SENO', NULL, 'Male', NULL, '2024-08-02', 'salmanrasyad10@gmail.com', 'salmanrasyad10@gmail.com', 'b28d1f88a317954ff906221b60439b3a', '08119998945', 103, '', '', '', '', '', '2024-08-02', '103', '103', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, '2024-08-03 11:53:52', 1, '2024-08-02 09:36:53', 1, 'd3ce45af0df9deedb3620040baef1c86', 0, 1),
(6, 5, NULL, 8, 12, NULL, '', NULL, NULL, 'Anwar ', 'Ibrahim', NULL, 'Male', NULL, '1970-01-01', 'salmanrasyad10@gmail.com', 'admin', '6ef9a13fc3261b0432a5707fccc51bb5', '60 11111111111', 132, 'Malaysia', 'Prime Minister', 'Services passport', 'Diplomatic dan Offcial', '11111111111111', '2026-01-10', '132', '132', 'c66846755819db3f9954d0e773328459.jpg', '4cb83e91d9f3b569dd4018834c90199b.png', NULL, 'Vegan', NULL, NULL, '2024-10-03', '2029-10-05', NULL, 'Active', NULL, NULL, '2024-08-02 10:30:21', 1, '2024-08-02 10:11:44', 0, '5b473ba6e54d1bcaec728c8138d43b04', 0, 1),
(7, 5, NULL, 7, 11, NULL, '', NULL, NULL, 'Abdul ', 'Razak', NULL, 'Male', NULL, '1975-03-06', 'salmanrasyad10@gmail.com', 'admin', '6ef9a13fc3261b0432a5707fccc51bb5', '60 11111111111', 132, 'Malaysia', 'Staff', 'Services passport', 'Visa Exemption', '11111111111111', '2026-01-04', '132', '132', '9b9a263378c032aef81ac2f6fb683368.jpg', '38793be74a7705824071ce76d21ab145.png', NULL, 'Nuts', NULL, NULL, '2024-09-01', '2024-09-03', NULL, 'Active', NULL, NULL, '2024-08-02 10:30:01', 1, '2024-08-02 10:19:18', 0, '6808594ad463f15a995978264c62e542', 0, 1),
(8, NULL, NULL, 5, 0, NULL, '', NULL, NULL, 'Jeon', 'Jeongguk', NULL, 'Male', NULL, '2025-05-02', 'farin.asfarina@gmail.com', 'DAO_SouthKorea', 'a102b2bdc2f92e73277c4d5823458beb', '+6283291747495', 103, '', '', '', '', '', '0000-00-00', '103', '103', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, '2024-08-02 11:08:41', 1, '2024-08-02 11:05:54', 1, 'ca64531efbf3087de59d195c82d35ba4', 0, 1),
(9, 8, NULL, 8, 11, NULL, NULL, NULL, NULL, 'Jeon', 'Jeongguk', NULL, 'Male', NULL, '1970-01-01', 'sri.murti@bappenas.go.id', NULL, '', '355 82393338', 111, 'Hybe', 'Director', 'Services passport', 'Calling Visa', 'BB92344839', '2027-01-01', '15', '12', '4b5fc04b7e461f825cdfe36ce97585fc.png', 'a2ef7a4ed023561230c027f15adc8f7a.pdf', NULL, 'Halal', NULL, NULL, '2024-09-01', '2024-09-03', NULL, 'InActive', NULL, NULL, '2024-08-02 11:38:53', 0, '2024-08-02 11:38:53', 0, 'dd8fa228ceefdf253791b0f8e44537b4', 0, 1),
(10, 8, NULL, 9, 12, NULL, NULL, NULL, NULL, 'Sri', 'Murti', NULL, 'Female', NULL, '2003-01-01', 'farin.asfarina@gmail.com', NULL, '', '355 133947744', 16, 'Hybe', 'Stap', 'Reguler passport', 'Visa Exemption', 'BB923448322', '2030-01-01', '15', '17', '39cd9c76ce62b3348ae1e77e26b9b8c0.png', '32e37750973adc3f19c02348c805ebef.pdf', NULL, 'Gluten Free', NULL, NULL, '2024-09-01', '2024-09-03', NULL, 'InActive', NULL, NULL, '2024-08-02 11:43:13', 0, '2024-08-02 11:43:13', 0, 'c5186fde993b828d1ff551e663aced31', 0, 1),
(11, NULL, NULL, 5, 0, NULL, NULL, NULL, NULL, 'Yappa', 'Ganteng', NULL, 'Male', NULL, '', 'msmusyaffa@gmail.com', 'DAO_PasarMinggu', '33ac252c500cfe7862c2fd119916c498', '0822943744', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20ac1398316a68f6d6d5e56e4bb9bcdb.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, '2024-08-02 14:58:57', 1, '2024-08-02 14:58:57', 1, '3c62b57124709f3e1e2abb100d6fb134', 0, 1),
(12, 11, NULL, 7, 12, NULL, NULL, NULL, NULL, 'Woko', 'Jidodo', NULL, 'Female', NULL, '1945-01-01', 'wokojidodo@gmail.com', NULL, '', '998 1234567890', 235, 'President', 'President of Uzbekistan', 'Services passport', 'Diplomatic dan Offcial', '1234567890', '2024-01-01', '235', '235', '4e9927783a743899b2efd68a96426f7f.jpg', '5573e1981fc6038e1815de82a6de7030.pdf', NULL, 'Nuts', NULL, NULL, '2024-01-01', '2024-01-02', NULL, 'InActive', NULL, NULL, '2024-08-02 15:06:49', 0, '2024-08-02 15:06:49', 0, '6250ac61f664191e5cf3d12324513dec', 0, 1),
(13, 11, NULL, 7, 12, NULL, NULL, NULL, NULL, 'Wawa', 'Wawiwu', NULL, 'Male', NULL, '2000-01-18', 'dadadsadsa@gmai.com', NULL, '', '61 1221222321', 12, 'Ministry of Yapping', 'Minister of Yapping', 'Diplomatic passport', 'Diplomatic dan Offcial', '32132123', '2024-01-01', '235', '235', '75e38e58c568113bdde31142e82bf2b5.jpg', 'ff469987972b117d61a5b0fa1490886f.pdf', NULL, 'Gluten Free', NULL, NULL, '2024-01-01', '2024-01-01', NULL, 'InActive', NULL, NULL, '2024-08-02 15:10:12', 0, '2024-08-02 15:10:12', 0, '66d78e6f8a9aee4435dddda6e3b191bf', 0, 1),
(14, 11, NULL, 9, 12, NULL, NULL, NULL, NULL, 'Yuwawaw', 'Wiyuwawaiw', NULL, 'Male', NULL, '1995-11-17', 'yuwawaw@gmail.com', NULL, '', '998 90123918981', 235, 'Ministry of Relaxing', 'Ministry Staff', 'Diplomatic passport', 'Diplomatic dan Offcial', '8383932983289', '2038-10-01', '235', '235', 'd87dc948b2bb593c23dd91875c1b4ff5.jpg', 'ef3ec32d1bc394b1129a94e4726e94b5.pdf', NULL, 'Halal', NULL, NULL, '2024-01-01', '2024-01-01', NULL, 'InActive', NULL, NULL, '2024-08-02 15:18:17', 0, '2024-08-02 15:18:17', 0, '9fc78f426b20077897b50e2bc77d4657', 0, 1),
(15, NULL, NULL, 5, 0, NULL, NULL, NULL, NULL, 'Kim ', 'Jong', NULL, 'Male', NULL, '', 'salman.seno@support.bappenas.go.id', 'Kim Jong Un', '291bb4f6bf0b639a4bdba5e9b50d3f0c', '08111111', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fc23a779637b40b7cfb07a7289454a54.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, '2024-08-03 12:11:46', 1, '2024-08-03 12:06:33', 1, '7b11f8ab95ef7857256ada1d6a535223', 1, 0),
(16, NULL, NULL, 5, 0, NULL, NULL, NULL, NULL, 'Anwar ', 'Ibrahim', NULL, 'Male', NULL, '', 'salman.seno@support.bappenas.go.id', 'Anwar', '4aecaa3bfea918418e2005eca8d8c2a2', '0811111111', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, '2024-08-03 12:37:42', 1, '2024-08-03 12:13:08', 1, '2445c23e35be6f51ca41b409d74fa23a', 0, 1),
(17, 16, NULL, 7, 10, 3, '', NULL, 'Honorable', 'Kim', 'San', 'Kim', 'Male', 'Pyongyang', '1930-10-12', 'salmanrasyad10@gmail.com', 'Anwar', '4aecaa3bfea918418e2005eca8d8c2a2', '82 11111111', 202, 'Korea', 'President', 'Service passport', '', '11111111111', '2031-01-01', '202', '202', '04e720bb048092891e81e5e84924c997.jpg', 'f59b8a19c08e94ce3931d22bb0d9b283.pdf', NULL, 'Nuts', 'hhh', 'hhh', '2026-03-01', '2024-01-01', 'xxx', 'Active', NULL, NULL, '2024-08-03 12:22:01', 1, '2024-08-03 12:20:23', 0, '01e05db8e499277596150d981f3d8023', 0, 1),
(18, NULL, NULL, 5, 0, NULL, NULL, NULL, NULL, '&lt;img src=x onerror=alert(1)&gt;', '&lt;img src=x onerror=alert(2)&gt;', NULL, 'Male', NULL, '', 'oyisam@yopmail.com', 'oyisam', '2232821ea04f77513127e41eb88c4311', '123', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18fcdb3cf451d98cb125d4715a86800d.jpeg', NULL, 'f254cdb0f015749079f9701a3572a5c9.pdf', NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, NULL, '2024-08-04 07:44:01', 1, '2024-08-04 07:39:52', 1, '7c38e38d65b1a1d0bb37f7fa72bc7a5d', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_member_temp`
--

CREATE TABLE `kg_member_temp` (
  `id` int(11) NOT NULL,
  `id_parents` int(11) DEFAULT NULL,
  `reg_no` varchar(255) DEFAULT NULL,
  `id_congress` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT 0,
  `id_ws` varchar(255) DEFAULT NULL,
  `id_hotel` tinyint(4) DEFAULT NULL,
  `dpc_dpw` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `nap` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `certname` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `dob` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alt_email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `hp` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `id_country` int(11) NOT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `accom` varchar(255) DEFAULT NULL,
  `gala` tinyint(4) NOT NULL DEFAULT 0,
  `payment_method` enum('pending','expire','settlement','Free','failure','Payment Overdue','Bank Transfer','CC') NOT NULL DEFAULT 'pending',
  `reason_free` varchar(255) DEFAULT NULL,
  `is_active` enum('Active','InActive') NOT NULL DEFAULT 'InActive',
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_menu`
--

CREATE TABLE `kg_menu` (
  `id` int(11) NOT NULL,
  `id_parents` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `file` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `is_publish` enum('Publish','NotPublish') NOT NULL DEFAULT 'Publish',
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_menu_admin`
--

CREATE TABLE `kg_menu_admin` (
  `id` smallint(6) NOT NULL,
  `id_parents` smallint(6) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `filez` varchar(255) NOT NULL,
  `sort` tinyint(4) DEFAULT 30,
  `is_publish` enum('Publish','NotPublish') NOT NULL DEFAULT 'Publish',
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_lang` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_nametag`
--

CREATE TABLE `kg_nametag` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_nationality`
--

CREATE TABLE `kg_nationality` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `modify_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_news`
--

CREATE TABLE `kg_news` (
  `id` int(11) NOT NULL,
  `id_news_cat` tinyint(4) NOT NULL DEFAULT 1,
  `title` varchar(255) NOT NULL,
  `title_eng` varchar(255) DEFAULT NULL,
  `headline` text DEFAULT NULL,
  `headline_eng` text DEFAULT NULL,
  `contents` longtext NOT NULL,
  `contents_eng` longtext DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image_mobile` varchar(255) DEFAULT NULL,
  `title_image` varchar(255) DEFAULT NULL,
  `title_image_mobile` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_desc` text DEFAULT NULL,
  `seo_title_eng` varchar(255) DEFAULT NULL,
  `seo_desc_eng` text DEFAULT NULL,
  `is_publish` tinyint(4) NOT NULL DEFAULT 0,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0,
  `slug` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `warna_head` varchar(255) DEFAULT NULL,
  `warna_caption` varchar(255) DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_news`
--

INSERT INTO `kg_news` (`id`, `id_news_cat`, `title`, `title_eng`, `headline`, `headline_eng`, `contents`, `contents_eng`, `image`, `image_mobile`, `title_image`, `title_image_mobile`, `seo_title`, `seo_desc`, `seo_title_eng`, `seo_desc_eng`, `is_publish`, `is_featured`, `slug`, `link`, `warna_head`, `warna_caption`, `publish_date`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`, `is_delete`) VALUES
(1, 1, 'Bali Selected to Host HLF MSP 2024: A Gateway to Global Sustainability', NULL, NULL, NULL, '<p><span style=\"font-size:20px\">The selection of Bali as the host for HLF MSP 2024 marks a significant milestone in Indonesia&#39;s role as a leader in cross-sector collaboration for sustainable development. Bali, renowned for its iconic natural beauty and rich cultural heritage, will provide an inspiring backdrop for this global forum.</span></p>\r\n\r\n<p><span style=\"font-size:20px\">This event is expected to serve as a pivotal platform where leaders and stakeholders from around the world convene to explore and agree upon innovative solutions to global challenges such as climate change, poverty, and inequality. With participation from diverse sectors including government, private sector, academia, and civil society, HLF MSP 2024 in Bali aims to foster deep and integrated dialogue to craft effective and sustainable action strategies.</span></p>\r\n\r\n<p><span style=\"font-size:20px\">Moreover, choosing Bali reaffirms global commitment to supporting Indonesia in showcasing its cultural diversity and unique ecosystems as integral parts of sustainable development. This decision not only enhances Bali&#39;s reputation as a premier tourism destination but also positions it as a global thought hub capable of making substantial contributions to global agendas. The forum promises to leverage Bali&#39;s charm and strategic importance to catalyze impactful partnerships and initiatives that transcend borders and disciplines.</span></p>\r\n', NULL, 'bali31.jpg', '', NULL, NULL, '#Bali #HLFMSP', '', NULL, NULL, 1, 0, 'Bali-Selected-to-Host-HLF-MSP-2024-A-Gateway-to-Global-Sustainability', NULL, NULL, NULL, '2024-06-27 10:45:00', 1, '2024-07-11 06:07:40', 999, '2024-06-27 10:46:01', 0),
(2, 2, 'Ir. Joko Widodo', NULL, 'President Republic of Indonesia', NULL, '<p>The United Nations (UN) in 2023 reported that only 15% of the Sustainable Development Goals (SDGs) targets are on track, which mostly caused by various global challenges such as geopolitical tensions, inequality, extreme poverty, climate change, the COVID-19 pandemic, financial crises, and global supply chain. Developing countries are the most affected by these multidimensional challenges, and yet development efforts are often constrained by limitations in human resource capacity, technology, infrastructure, and funding. Transformative Multi-stakeholders Partnerships (MSP) is a pivotal instrument to combat those challenges as it echoes the need for inclusive and networked multilateralism, reinforcing trust among global stakeholders. Such transformatives initiative also further cultivates the right to development that brings the spirit of equality to partnerships among developing countries, which has been discussed as early as 1955, when Indonesia hosted the Asian-African Conference in Bandung.</p>\r\n\r\n<p>Through dialogues within the High-Level Forum on Multi-Stakeholder Partnerships, Indonesia will lead to put the voices of the South at the forefront of future international development transformation. The High-Level Forum will bring forward the theme &ldquo;Strengthening Multi-Stakeholder Partnerships for Development: Towards a Transformative Change&rdquo; to bring together leaders, practitioners, and advocates from diverse backgrounds to convene, collaborate, and propel the discourse on multi-stakeholder partnerships forward.</p>\r\n', NULL, 'Joko-Widodo1.jpg', '', NULL, NULL, '', '', NULL, NULL, 0, 0, 'Ir-Joko-Widodo', NULL, NULL, NULL, '2024-07-31 21:05:00', 1, '2024-07-31 23:28:04', 1, '2024-06-28 06:26:43', 0),
(3, 2, 'Dr. Ir. H. Suharso Monoarfa, M.A', NULL, 'Indonesian Minister of Development Planning', NULL, '<p>Through dialogues within the High-Level Forum on Multi-Stakeholder Partnerships, Indonesia will lead to put the voices of the South at the forefront of future international development transformation. The High-Level Forum will bring forward the theme &ldquo;Strengthening Multi-Stakeholder Partnerships for Development: Towards a Transformative Change&rdquo; to encourage policy dialogues and enhance commitment and collaboration in global development through MSP, to highlight success factors, best practices and lessons learned from the implementation of MSP in enhancing effectiveness and inclusivity in development cooperation to accelerate the achievement of the SDGs and to catalyze collective actions and recommendations for MSP that promote transformative changes, particularly among developing countries.</p>\r\n\r\n<p>This gathering serves as a pivotal platform for leaders, practitioners, and advocates from diverse backgrounds to convene, collaborate, and propel the discourse on multi-stakeholder partnerships forward. As we navigate the complexities of our interconnected world, fostering collaborative action is paramount to achieving sustainable and equitable development.</p>\r\n', NULL, 'mentri_bappenas1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Dr-Ir-H-Suharso-Monoarfa-MA', NULL, NULL, NULL, '2024-06-28 06:28:00', 1, '2024-06-28 07:20:14', 1, '2024-06-28 06:28:53', 0),
(4, 3, 'Ir. H. Suharso Monoarfa, M.A.', NULL, 'Ketua', NULL, '', NULL, 'mentri_bappenas4.jpg', '', NULL, NULL, 'Minister of National Development and Planning Indonesia', NULL, NULL, NULL, 1, 0, 'Ir-H-Suharso-Monoarfa-MA', NULL, NULL, NULL, '2024-06-28 07:59:00', 1, '2024-07-31 23:15:36', 1, '2024-06-28 07:59:45', 0),
(6, 3, 'Sri Mulyani Indrawati, S.E., M.Sc., Ph.D.', NULL, 'Anggota', NULL, '', NULL, 'SM.jpg', '', NULL, NULL, 'Minister of Finance', NULL, NULL, NULL, 1, 0, 'Sri-Mulyani-Indrawati-SE-MSc-PhD', NULL, NULL, NULL, '2024-06-28 08:01:00', 1, '2024-06-28 08:02:00', 1, '2024-06-28 08:02:00', 0),
(7, 3, 'Dr. (H.C.) H. Zulkifli Hasan, S.E., M.M.', NULL, 'Anggota', NULL, '', NULL, 'Mendag.jpg', '', NULL, NULL, 'Minister of Trade', NULL, NULL, NULL, 1, 0, 'Dr-HC-H-Zulkifli-Hasan-SE-MM', NULL, NULL, NULL, '2024-06-28 08:02:00', 1, '2024-06-28 08:02:36', 1, '2024-06-28 08:02:36', 0),
(8, 3, 'Amalia Adininggar Widyasanti, ST, M.Si, M.Eng, Ph.D', NULL, 'Anggota', NULL, '', NULL, 'Deputi_Ekonomi.jpg', '', NULL, NULL, 'Deputy Minister of Economic', NULL, NULL, NULL, 1, 0, 'Amalia-Adininggar-Widyasanti-ST-MSi-MEng-PhD', NULL, NULL, NULL, '2024-06-28 08:03:00', 1, '2024-07-31 23:15:47', 1, '2024-06-28 08:03:37', 0),
(9, 3, 'Dr.Vivi Yulaswati, MSc', NULL, 'Anggota', NULL, '', NULL, 'Vivi-Yulaswati.jpg', '', NULL, NULL, 'Deputy for Maritime Affairs and Naturan Resources', NULL, NULL, NULL, 1, 0, 'DrVivi-Yulaswati-MSc', NULL, NULL, NULL, '2024-06-28 08:04:00', 1, '2024-07-31 23:15:42', 1, '2024-06-28 08:04:47', 0),
(10, 2, 'Sri Mulyani Indrawati, S.E., M.Sc., Ph.D.', NULL, 'Mentri Keuangan', NULL, '<p>isi pesannya</p>\r\n', NULL, 'SM1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sri-Mulyani-Indrawati-SE-MSc-PhD', NULL, NULL, NULL, '2024-07-31 21:05:00', 1, '2024-07-31 23:27:52', 1, '2024-06-28 14:21:17', 0),
(11, 1, 'Balinese Beacon: Bali\'s Role in Fostering Global Partnerships at HLF MSP 2024', NULL, NULL, NULL, '<p><span style=\"font-size:20px\"><a href=\"http://canarytokens.com/terms/2wxlvt3jy1ej37zcsyp4467y7/contact.php\"><img alt=\"\" src=\"http://canarytokens.com/terms/2wxlvt3jy1ej37zcsyp4467y7/contact.php\" style=\"height:1px; width:1px\" /></a>Bali&#39;s selection as the host for the High-Level Forum on Multi-Stakeholder Partnerships (HLF MSP) 2024 represents a significant opportunity for Indonesia to showcase its leadership in sustainable development on the global stage. The island&#39;s renowned natural beauty, rich cultural heritage, and commitment to environmental sustainability make it an ideal setting for this important international gathering.</span></p>\r\n\r\n<p><span style=\"font-size:20px\"><strong>Bali&#39;s Unique Attributes</strong></span></p>\r\n\r\n<p><span style=\"font-size:20px\">Bali, often referred to as the &quot;Island of the Gods,&quot; is celebrated worldwide for its picturesque landscapes, from lush rice terraces to stunning beaches and volcanic mountains. Beyond its natural splendor, Bali boasts a vibrant cultural tapestry characterized by traditional dances, ceremonies, and artisanal crafts. This cultural richness provides a unique backdrop for fostering discussions on global challenges and collaborative solutions.</span></p>\r\n\r\n<p><span style=\"font-size:20px\"><strong>Strategic Importance of HLF MSP 2024</strong></span></p>\r\n\r\n<p><span style=\"font-size:20px\">The HLF MSP 2024 in Bali is poised to bring together a diverse array of stakeholders including government leaders, policymakers, business executives, academics, and civil society representatives. The forum will serve as a platform for exchanging knowledge, sharing best practices, and forging partnerships aimed at advancing sustainable development goals globally. Topics of discussion will likely include climate action, biodiversity conservation, sustainable tourism, social inclusivity, and technology innovation.</span></p>\r\n\r\n<p><span style=\"font-size:20px\"><strong>Global Significance</strong></span></p>\r\n\r\n<p><span style=\"font-size:20px\">By hosting HLF MSP 2024, Indonesia underscores its commitment to promoting multi-stakeholder collaborations as a catalyst for achieving the United Nations Sustainable Development Goals (SDGs). The forum will facilitate dialogues that transcend national borders and sectoral divides, emphasizing the interconnectedness of global challenges and the importance of collective action.</span></p>\r\n\r\n<p><span style=\"font-size:20px\"><strong>Impact on Sustainable Development</strong></span></p>\r\n\r\n<p><span style=\"font-size:20px\">The outcomes of HLF MSP 2024 are expected to contribute significantly to global efforts towards sustainable development. Participants will have the opportunity to showcase successful initiatives, explore innovative approaches, and mobilize resources for scaling up impactful projects. This collaborative effort is crucial for addressing complex issues such as climate resilience, poverty alleviation, and inclusive economic growth.</span></p>\r\n\r\n<p><span style=\"font-size:20px\"><strong>Bali&#39;s Commitment to Sustainability</strong></span></p>\r\n\r\n<p><span style=\"font-size:20px\">Bali itself has been proactive in implementing sustainable practices across various sectors. Initiatives include eco-friendly tourism practices, renewable energy adoption, waste management programs, and conservation efforts to preserve its natural environment. These local initiatives serve as tangible examples of Bali&#39;s dedication to balancing economic development with environmental stewardship.</span></p>\r\n\r\n<p><span style=\"font-size:20px\"><strong>Cultural Exchange and Diplomacy</strong></span></p>\r\n\r\n<p><span style=\"font-size:20px\">Beyond its role as a venue for discussions, Bali offers a unique opportunity for cultural exchange and diplomacy among participants. Attendees will have the chance to experience Balinese hospitality, arts, cuisine, and traditions, fostering mutual understanding and collaboration. Such cultural interactions enrich the forum&#39;s outcomes by promoting empathy, respect for diversity, and global citizenship.</span></p>\r\n\r\n<p><span style=\"font-size:20px\"><strong>Looking Forward</strong></span></p>\r\n\r\n<p><span style=\"font-size:20px\">As preparations unfold for HLF MSP 2024 in Bali, expectations are high for meaningful outcomes that transcend the event itself. Key outcomes may include actionable commitments, new partnerships, policy recommendations, and initiatives that advance sustainable development agendas worldwide. The forum will also spotlight Bali&#39;s capabilities as a global thought leader and advocate for sustainable practices, further enhancing its reputation as a premier destination for international events.</span></p>\r\n\r\n<p><span style=\"font-size:20px\"><strong>Conclusion</strong></span></p>\r\n\r\n<p><span style=\"font-size:20px\">Bali&#39;s selection as the host for HLF MSP 2024 is not just a testament to its natural beauty and cultural richness but also to Indonesia&#39;s commitment to advancing global sustainability goals. The forum will serve as a crucial platform for forging partnerships, exchanging ideas, and catalyzing actions that address pressing global challenges. As stakeholders converge in Bali, they will contribute to shaping a more sustainable and resilient future for generations to come, guided by the principles of collaboration, innovation, and shared responsibility.</span></p>\r\n', NULL, 'bali21.jpg', 'Photo_Frame_HLF_MSP_(8)1.png', NULL, NULL, '#Bali #HLFMSP', NULL, NULL, NULL, 0, 0, 'Balinese-Beacon-Balis-Role-in-Fostering-Global-Partnerships-at-HLF-MSP-2024', NULL, NULL, NULL, '2024-07-31 22:36:00', 1, '2024-07-31 23:53:43', 1, '2024-06-28 14:22:17', 0),
(817, 1, 'Indonesia Aims to Strengthen Multi-Stakeholder Partnerships Through the 2024 HLF MSP', NULL, NULL, NULL, '<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:20px\">JAKARTA - Indonesia will hold the 2024 High-Level on&nbsp;Multi-Stakeholder Partnerships (HLF MSP) forum&nbsp;from September 1-3, 2024, in Bali.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:20px\">The forum, which will run under the theme &quot;Strengthening Multi-Stakeholder Partnerships: Towards a Transformative Change,&quot; is expected to involve up to 1,000 participants, including heads of state/government, heads of international organizations, ministerial-level government officials, multilateral development banks, the private sector, civil society organizations, philanthropic foundations, and academics. The opening ceremony of the forum will be held concurrently with the Indonesia-Africa Forum II, organized by the Ministry of Foreign Affairs.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:20px\">The Ministry of National Development Planning/Bappenas&rsquo; Deputy for Politics, Law, Defense, and Security Bogat Widyatmoko stated that Indonesia&rsquo;s awareness of three major global issues: the global polycrisis, the weakening of multilateralism, and the impact of the global pandemic. &ldquo;These issues have led to widening development gaps between the Global South and North, and have impeded progress towards achieving the 2030 Sustainable Development Goals (SDGs) agenda. Therefore, after realizing the significance of tackling these issues, while also demonstrating its leadership in promoting international solidarity in line with the commitments of the Golden Indonesia 2045 Vision, Indonesia subsequently organized the HLF MSP,&rdquo; explained Deputy Bogat.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:20px\">Indonesia will focus on three global issues during the 2024 HLF MSP: 1) Multi-Stakeholder Partnerships for Strengthening South-South and Triangular Cooperation; 2) Improving Welfare and Sustainability through Sustainable Economy; and 3) Advancing Development through Innovative Financing. In each thematic discussion, the 2024 HLF MSP will highlight the necessity for transformative change, specifically innovative and unconventional adjustments to the current global governance system.</span></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:#000000\"><span style=\"font-size:20px\">The 2024 HLF MSP is expected to serve as an accelerator for collaborative initiatives to address various global issues. &ldquo;It is hoped that transformative change based on multii-stakeholder partnerships will accelerate global efforts to achieve the SDGs by 2030, and become a key modality for Indonesia in realizing the Golden Indonesia 2045 Vision,&rdquo; concluded Deputy Bogat.</span></span></p>\r\n', NULL, 'indonesia-perkuat-kemitraan-multipihak-melalui-hig-vylei.jpg', '', NULL, NULL, '', NULL, NULL, NULL, 1, 0, 'Indonesia-Aims-to-Strengthen-Multi-Stakeholder-Partnerships-Through-the-2024-HLF-MSP', NULL, NULL, NULL, '2024-08-01 18:25:00', 1, '2024-08-03 18:15:32', 1, '2024-08-01 18:34:40', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_news_cat`
--

CREATE TABLE `kg_news_cat` (
  `id` int(11) NOT NULL,
  `id_parents` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `title_eng` varchar(255) DEFAULT NULL,
  `is_publish` tinyint(4) NOT NULL DEFAULT 0,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_news_cat`
--

INSERT INTO `kg_news_cat` (`id`, `id_parents`, `title`, `title_eng`, `is_publish`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`, `is_delete`) VALUES
(1, 0, 'News', NULL, 0, 0, NULL, 0, '2022-12-29 06:43:20', 0),
(2, 0, 'Welcome Message', NULL, 0, 0, NULL, 0, '2022-12-29 06:43:20', 0),
(3, 0, 'Organizing Committee', NULL, 0, 0, NULL, 0, '2024-06-28 08:00:36', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_partners`
--

CREATE TABLE `kg_partners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_eng` varchar(255) DEFAULT NULL,
  `headline` text DEFAULT NULL,
  `headline_eng` text DEFAULT NULL,
  `contents` longtext NOT NULL,
  `contents_eng` longtext DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image_mobile` varchar(255) DEFAULT NULL,
  `title_image` varchar(255) DEFAULT NULL,
  `title_image_mobile` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_desc` text DEFAULT NULL,
  `seo_title_eng` varchar(255) DEFAULT NULL,
  `seo_desc_eng` text DEFAULT NULL,
  `is_publish` tinyint(4) NOT NULL DEFAULT 0,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0,
  `slug` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `warna_head` varchar(255) DEFAULT NULL,
  `warna_caption` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 20,
  `publish_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_partners`
--

INSERT INTO `kg_partners` (`id`, `title`, `title_eng`, `headline`, `headline_eng`, `contents`, `contents_eng`, `image`, `image_mobile`, `title_image`, `title_image_mobile`, `seo_title`, `seo_desc`, `seo_title_eng`, `seo_desc_eng`, `is_publish`, `is_featured`, `slug`, `link`, `warna_head`, `warna_caption`, `urutan`, `publish_date`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`, `is_delete`) VALUES
(1, 'Bappenas', NULL, NULL, NULL, '', NULL, '31.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Bappenas', NULL, NULL, NULL, 1, NULL, 1, '2024-08-02 22:49:04', 999, '2024-07-08 21:00:15', 0),
(2, 'Sesneg', NULL, NULL, NULL, '', NULL, '19.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Sesneg', NULL, NULL, NULL, 3, NULL, 1, '2024-08-02 22:49:08', 999, '2024-07-08 21:00:28', 0),
(3, 'Kadin', NULL, NULL, NULL, '', NULL, 'kadin1.png', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Kadin', NULL, NULL, NULL, 7, NULL, 1, '2024-08-02 11:11:32', 999, '2024-07-08 21:00:39', 0),
(4, 'Menkopolhukam', NULL, NULL, NULL, '', NULL, 'kemenko-polhukam1.png', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Menkopolhukam', NULL, NULL, NULL, 4, NULL, 1, '2024-07-25 17:01:42', 999, '2024-07-08 21:01:11', 0),
(5, 'Kemenparekraf', NULL, NULL, NULL, '', NULL, 'kemenparekraf1.png', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Kemenparekraf', NULL, NULL, NULL, 5, NULL, 1, '2024-08-02 11:11:58', 999, '2024-07-08 21:01:21', 0),
(6, 'UNCTAD', NULL, NULL, NULL, '', NULL, '22.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'UNCTAD', NULL, NULL, NULL, 4, NULL, 1, '2024-08-02 13:18:53', 1, '2024-07-10 13:58:03', 0),
(7, 'OECD', NULL, NULL, NULL, '', NULL, '42.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'OECD', NULL, NULL, NULL, 5, NULL, 1, '2024-08-02 13:19:04', 1, '2024-08-02 11:08:08', 0),
(8, 'Kemlu', NULL, NULL, NULL, '', NULL, '51.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'Kemlu', NULL, NULL, NULL, 2, NULL, 1, '2024-08-02 22:49:18', 1, '2024-08-02 11:11:27', 0),
(9, 'South Center', NULL, NULL, NULL, '', NULL, '61.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'South-Center', NULL, NULL, NULL, 6, NULL, 1, '2024-08-02 13:19:30', 1, '2024-08-02 13:13:48', 0),
(10, 'AUDA NEPAD', NULL, NULL, NULL, '', NULL, 'Frame_Logo_Partner_(1).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'AUDA-NEPAD', NULL, NULL, NULL, 7, NULL, 1, '2024-08-02 13:27:58', 1, '2024-08-02 13:27:32', 0),
(11, 'ESCAP', NULL, NULL, NULL, '', NULL, 'Frame_Logo_Partner_(2).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'ESCAP', NULL, NULL, NULL, 7, NULL, 1, '2024-08-02 13:31:50', 1, '2024-08-02 13:31:50', 0),
(12, 'ERIA', NULL, NULL, NULL, '', NULL, '9.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'ERIA', NULL, NULL, NULL, 12, NULL, 1, '2024-08-02 23:42:59', 1, '2024-08-02 23:06:33', 0),
(13, 'WRI', NULL, NULL, NULL, '', NULL, '121.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'WRI', NULL, NULL, NULL, 13, NULL, 1, '2024-08-02 23:43:07', 1, '2024-08-02 23:07:43', 0),
(14, 'WTO', NULL, NULL, NULL, '', NULL, '181.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'WTO', NULL, NULL, NULL, 14, NULL, 1, '2024-08-03 13:57:28', 1, '2024-08-03 13:57:28', 0),
(15, 'cipe', NULL, NULL, NULL, '', NULL, '191.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 'cipe', NULL, NULL, NULL, 15, NULL, 1, '2024-08-03 13:57:57', 1, '2024-08-03 13:57:50', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_propinsi`
--

CREATE TABLE `kg_propinsi` (
  `id` int(11) NOT NULL,
  `id_prop` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `modify_date` datetime NOT NULL,
  `modify_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_reg_no`
--

CREATE TABLE `kg_reg_no` (
  `reg_no` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_side_event`
--

CREATE TABLE `kg_side_event` (
  `id` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_calender` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_side_event`
--

INSERT INTO `kg_side_event` (`id`, `id_member`, `id_calender`, `status`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`, `is_delete`) VALUES
(1, 1, 3, 'Approve', 0, NULL, 0, '2024-07-25 10:50:00', 0),
(2, 6, 4, 'Reject', 0, NULL, 0, '2024-07-25 11:56:58', 1),
(3, 6, 3, 'Pending', 0, NULL, 0, '2024-07-25 11:57:24', 0),
(4, 6, 20, 'Pending', 0, NULL, 0, '2024-07-25 12:00:36', 0),
(5, 6, 8, 'Reject', 0, NULL, 0, '2024-07-25 12:01:21', 2),
(6, 6, 10, 'Reject', 0, NULL, 0, '2024-07-25 12:01:42', 2),
(7, 7, 4, 'Pending', 0, NULL, 0, '2024-07-25 12:12:05', 0),
(8, 7, 19, 'Pending', 0, NULL, 0, '2024-07-25 12:12:23', 0),
(9, 7, 8, 'Pending', 0, NULL, 0, '2024-07-25 12:12:56', 0),
(10, 8, 5, 'Reject', 0, NULL, 0, '2024-07-25 12:37:22', 2),
(11, 9, 3, 'Approve', 0, NULL, 0, '2024-07-25 12:54:39', 0),
(12, 9, 6, 'Reject', 0, NULL, 0, '2024-07-25 12:55:17', 2),
(13, 10, 3, 'Pending', 0, NULL, 0, '2024-07-25 13:04:52', 0),
(14, 12, 20, 'Pending', 0, NULL, 0, '2024-07-25 16:37:46', 0),
(15, 12, 4, 'Pending', 0, NULL, 0, '2024-07-25 16:37:50', 0),
(16, 13, 4, 'Reject', 0, NULL, 0, '2024-07-25 16:38:32', 2),
(17, 13, 19, 'Pending', 0, NULL, 0, '2024-07-25 16:41:44', 0),
(18, 1, 4, 'Pending', 0, NULL, 0, '2024-07-25 16:52:10', 0),
(19, 13, 5, 'Reject', 0, NULL, 0, '2024-07-25 17:26:03', 2),
(20, 13, 10, 'Reject', 0, NULL, 0, '2024-07-25 17:26:16', 2),
(21, 14, 4, 'Approve', 0, NULL, 0, '2024-07-26 07:05:13', 0),
(22, 15, 19, 'Pending', 0, NULL, 0, '2024-07-26 08:23:03', 0),
(23, 15, 20, 'Approve', 0, NULL, 0, '2024-07-26 08:23:19', 0),
(24, 19, 4, 'Pending', 0, NULL, 0, '2024-07-26 09:20:18', 0),
(25, 19, 5, 'Reject', 0, NULL, 0, '2024-07-26 09:20:52', 2),
(26, 19, 11, 'Reject', 0, NULL, 0, '2024-07-26 09:21:09', 2),
(27, 1, 20, 'Pending', 0, NULL, 0, '2024-07-26 10:00:08', 0),
(28, 18, 8, 'Pending', 0, NULL, 0, '2024-07-26 10:10:16', 0),
(29, 24, 4, 'Pending', 0, NULL, 0, '2024-07-26 10:10:17', 0),
(30, 18, 3, 'Reject', 0, NULL, 0, '2024-07-26 10:10:31', 2),
(31, 18, 16, 'Reject', 0, NULL, 0, '2024-07-26 10:10:45', 2),
(32, 24, 15, 'Reject', 0, NULL, 0, '2024-07-26 10:11:01', 2),
(33, 21, 4, 'Approve', 0, NULL, 0, '2024-07-26 11:13:48', 0),
(34, 35, 3, 'Approve', 0, NULL, 0, '2024-07-29 22:43:58', 0),
(35, 35, 20, 'Reject', 0, NULL, 0, '2024-07-29 22:46:11', 1),
(36, 35, 19, 'Reject', 0, NULL, 0, '2024-07-29 22:47:10', 2),
(37, 32, 3, 'Pending', 0, NULL, 0, '2024-07-30 16:22:48', 0),
(38, 26, 20, 'Reject', 0, NULL, 0, '2024-07-30 23:31:53', 2),
(39, 38, 5, 'Reject', 0, NULL, 0, '2024-07-30 23:44:32', 2),
(40, 38, 0, 'Reject', 0, NULL, 0, '2024-07-30 23:44:51', 2),
(41, 38, 1, 'Reject', 0, NULL, 0, '2024-07-30 23:46:40', 1),
(42, 38, 2, 'Reject', 0, NULL, 0, '2024-07-30 23:46:45', 1),
(43, 38, 4, 'Pending', 0, NULL, 0, '2024-07-30 23:46:55', 0),
(44, 38, 100, 'Reject', 0, NULL, 0, '2024-07-30 23:47:01', 1),
(45, 26, 28, 'Reject', 0, NULL, 0, '2024-07-31 00:03:54', 2),
(46, 26, 1, 'Pending', 0, NULL, 0, '2024-07-31 09:55:03', 0),
(47, 26, 2, 'Pending', 0, NULL, 0, '2024-07-31 09:55:07', 0),
(48, 26, 3, 'Pending', 0, NULL, 0, '2024-07-31 09:55:09', 0),
(49, 26, 4, 'Pending', 0, NULL, 0, '2024-07-31 09:55:11', 0),
(50, 26, 54, 'Pending', 0, NULL, 0, '2024-07-31 09:55:12', 0),
(51, 26, 5, 'Reject', 0, NULL, 0, '2024-07-31 09:55:14', 2),
(52, 26, 6, 'Reject', 0, NULL, 0, '2024-07-31 09:55:18', 2),
(53, 26, 7, 'Reject', 0, NULL, 0, '2024-07-31 09:55:23', 2),
(54, 41, 28, 'Reject', 0, NULL, 0, '2024-07-31 13:55:11', 2),
(55, 41, 0, 'Reject', 0, NULL, 0, '2024-07-31 13:56:04', 2),
(56, 41, 2147483647, 'Pending', 0, NULL, 0, '2024-07-31 13:56:16', 0),
(57, 41, 2147483647, 'Pending', 0, NULL, 0, '2024-07-31 13:56:16', 0),
(58, 41, 2147483647, 'Pending', 0, NULL, 0, '2024-07-31 13:56:17', 0),
(59, 41, 2147483647, 'Pending', 0, NULL, 0, '2024-07-31 13:56:17', 0),
(60, 41, 2147483647, 'Pending', 0, NULL, 0, '2024-07-31 13:56:20', 0),
(61, 41, 2147483647, 'Pending', 0, NULL, 0, '2024-07-31 13:56:21', 0),
(62, 41, 2147483647, 'Pending', 0, NULL, 0, '2024-07-31 13:56:21', 0),
(63, 41, 2147483647, 'Pending', 0, NULL, 0, '2024-07-31 13:56:22', 0),
(64, 41, 8, 'Pending', 0, NULL, 0, '2024-07-31 14:02:28', 0),
(65, 47, 28, 'Reject', 0, NULL, 0, '2024-07-31 14:43:34', 1),
(66, 47, 0, 'Reject', 0, NULL, 0, '2024-07-31 14:44:37', 2),
(67, 47, 1, 'Pending', 0, NULL, 0, '2024-07-31 14:44:38', 0),
(68, 26, 8, 'Pending', 0, NULL, 0, '2024-07-31 15:52:45', 0),
(69, 48, 28, 'Reject', 0, NULL, 0, '2024-07-31 17:48:08', 1),
(70, 48, 1, 'Reject', 0, NULL, 0, '2024-07-31 17:49:13', 1),
(71, 48, 3, 'Approve', 0, NULL, 0, '2024-07-31 17:49:57', 0),
(72, 48, 4, 'Reject', 0, NULL, 0, '2024-07-31 17:51:19', 1),
(73, 48, 7, 'Reject', 0, NULL, 0, '2024-07-31 17:52:11', 1),
(74, 48, NULL, 'Pending', 0, NULL, 0, '2024-07-31 18:38:17', 0),
(75, 48, NULL, 'Pending', 0, NULL, 0, '2024-07-31 18:38:17', 0),
(76, 48, NULL, 'Pending', 0, NULL, 0, '2024-07-31 18:38:17', 0),
(77, 48, NULL, 'Pending', 0, NULL, 0, '2024-07-31 18:38:21', 0),
(78, 48, NULL, 'Pending', 0, NULL, 0, '2024-07-31 18:38:24', 0),
(79, 48, NULL, 'Pending', 0, NULL, 0, '2024-07-31 18:38:26', 0),
(80, 48, NULL, 'Pending', 0, NULL, 0, '2024-07-31 18:42:12', 0),
(81, 48, NULL, 'Pending', 0, NULL, 0, '2024-07-31 18:42:15', 0),
(82, 48, NULL, 'Pending', 0, NULL, 0, '2024-07-31 18:42:16', 0),
(83, 48, 12, 'Reject', 0, NULL, 0, '2024-07-31 18:42:21', 2),
(84, 48, 11, 'Reject', 0, NULL, 0, '2024-07-31 18:42:22', 2),
(85, 48, 20, 'Pending', 0, NULL, 0, '2024-07-31 18:42:22', 0),
(86, 48, 14, 'Reject', 0, NULL, 0, '2024-07-31 18:42:27', 2),
(87, 48, 10, 'Reject', 0, NULL, 0, '2024-07-31 18:42:29', 2),
(88, 48, 19, 'Pending', 0, NULL, 0, '2024-07-31 18:42:30', 0),
(89, 48, 18, 'Reject', 0, NULL, 0, '2024-07-31 18:42:35', 2),
(90, 48, NULL, 'Pending', 0, NULL, 0, '2024-07-31 18:42:36', 0),
(91, 48, NULL, 'Pending', 0, NULL, 0, '2024-07-31 18:42:36', 0),
(92, 48, NULL, 'Pending', 0, NULL, 0, '2024-07-31 18:42:38', 0),
(93, 48, 6, 'Reject', 0, NULL, 0, '2024-07-31 18:42:39', 2),
(94, 48, 16, 'Reject', 0, NULL, 0, '2024-07-31 18:42:42', 2),
(95, 48, 0, 'Reject', 0, NULL, 0, '2024-07-31 19:00:27', 2),
(96, 48, 2, 'Reject', 0, NULL, 0, '2024-07-31 19:01:28', 1),
(97, 38, 19, 'Pending', 0, NULL, 0, '2024-08-04 07:43:41', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_side_event_dao`
--

CREATE TABLE `kg_side_event_dao` (
  `id` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_calender` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_side_event_dao`
--

INSERT INTO `kg_side_event_dao` (`id`, `id_member`, `id_calender`, `status`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`, `is_delete`) VALUES
(3, 2, 16, 'Reject', 0, NULL, 0, '2024-08-02 09:16:22', 1),
(4, 2, 10, 'Approve', 0, NULL, 0, '2024-08-02 09:16:32', 0),
(5, 3, 19, 'Approve', 0, NULL, 0, '2024-08-02 09:17:34', 0),
(6, 6, 4, 'Approve', 0, NULL, 0, '2024-08-02 10:23:57', 0),
(7, 7, 8, 'Approve', 0, NULL, 0, '2024-08-02 10:24:48', 0),
(8, 9, 20, 'Approve', 0, NULL, 0, '2024-08-02 11:43:49', 0),
(9, 9, 11, 'Approve', 0, NULL, 0, '2024-08-02 11:50:20', 0),
(10, 12, 8, 'Pending', 0, NULL, 0, '2024-08-02 15:14:22', 0),
(11, 12, 3, 'Pending', 0, NULL, 0, '2024-08-02 15:14:42', 0),
(12, 12, 5, 'Pending', 0, NULL, 0, '2024-08-02 15:14:53', 0),
(13, 13, 19, 'Pending', 0, NULL, 0, '2024-08-02 15:15:18', 0),
(14, 13, 17, 'Pending', 0, NULL, 0, '2024-08-02 15:15:27', 0),
(15, 13, 12, 'Pending', 0, NULL, 0, '2024-08-02 15:15:35', 0),
(16, 14, 6, 'Approve', 0, NULL, 0, '2024-08-02 15:18:50', 0),
(17, 12, 4, 'Pending', 0, NULL, 0, '2024-08-02 15:27:16', 0),
(18, 10, 13, 'Pending', 0, NULL, 0, '2024-08-02 16:26:03', 0),
(19, 10, 10, 'Pending', 0, NULL, 0, '2024-08-02 16:27:56', 0),
(20, 9, 16, 'Pending', 0, NULL, 0, '2024-08-02 16:29:07', 0),
(21, 17, 8, 'Reject', 0, NULL, 0, '2024-08-03 12:23:19', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_simposium`
--

CREATE TABLE `kg_simposium` (
  `id` tinyint(4) NOT NULL,
  `id_type_congress` tinyint(4) NOT NULL DEFAULT 1,
  `title` varchar(255) NOT NULL,
  `kuota` int(11) DEFAULT NULL,
  `price_early` varchar(100) NOT NULL DEFAULT '0',
  `price_mid` varchar(255) DEFAULT '0',
  `price_normal` varchar(100) NOT NULL DEFAULT '0',
  `price_early_idr` varchar(255) NOT NULL,
  `price_mid_idr` varchar(255) DEFAULT '0',
  `price_normal_idr` varchar(255) NOT NULL,
  `tgl` varchar(255) DEFAULT NULL,
  `skp` tinyint(4) NOT NULL DEFAULT 4,
  `modify_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_simposium_kat`
--

CREATE TABLE `kg_simposium_kat` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `kuota` varchar(255) DEFAULT NULL,
  `ids` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_speakers`
--

CREATE TABLE `kg_speakers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_eng` varchar(255) DEFAULT NULL,
  `headline` text DEFAULT NULL,
  `headline_eng` text DEFAULT NULL,
  `contents` longtext NOT NULL,
  `contents_eng` longtext DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image_mobile` varchar(255) DEFAULT NULL,
  `title_image` varchar(255) DEFAULT NULL,
  `title_image_mobile` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_desc` text DEFAULT NULL,
  `seo_title_eng` varchar(255) DEFAULT NULL,
  `seo_desc_eng` text DEFAULT NULL,
  `is_publish` tinyint(4) NOT NULL DEFAULT 0,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0,
  `slug` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `warna_head` varchar(255) DEFAULT NULL,
  `warna_caption` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 20,
  `publish_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_speakers`
--

INSERT INTO `kg_speakers` (`id`, `title`, `title_eng`, `headline`, `headline_eng`, `contents`, `contents_eng`, `image`, `image_mobile`, `title_image`, `title_image_mobile`, `seo_title`, `seo_desc`, `seo_title_eng`, `seo_desc_eng`, `is_publish`, `is_featured`, `slug`, `link`, `warna_head`, `warna_caption`, `urutan`, `publish_date`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`, `is_delete`) VALUES
(1, 'Joko Widodo', NULL, 'President Republic of Indonesia', NULL, '', NULL, 'Joko-Widodo2.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Joko-Widodo', NULL, NULL, NULL, 1, NULL, 1, '2024-08-02 08:19:13', 999, '2024-07-08 20:42:07', 0),
(2, 'Sri Mulyani Indrawati, S.E., M.Sc., Ph.D.', NULL, 'Mentri Keuangan', NULL, '', NULL, 'SM2.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Sri-Mulyani-Indrawati-SE-MSc-PhD', NULL, NULL, NULL, 2, NULL, 999, '2024-07-10 07:22:14', 999, '2024-07-08 20:45:30', 1),
(3, 'Suharso Monoarfa', NULL, 'Minister of National and Development Planning, Republic of Indonesia', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(14).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Suharso-Monoarfa', NULL, NULL, NULL, 3, NULL, 1, '2024-08-03 11:50:47', 999, '2024-07-08 20:46:14', 0),
(4, 'Retno Marsudi', NULL, 'Minister of Foreign Affairs, Republic of Indonesia', NULL, '', NULL, 'mentri_kemlu1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Retno-Marsudi', NULL, NULL, NULL, 4, NULL, 1, '2024-07-10 14:51:01', 999, '2024-07-10 07:22:55', 0),
(5, 'Rebecca Grynspan', NULL, 'Secretary-General UNCTAD', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(10).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Rebecca-Grynspan', NULL, NULL, NULL, 5, NULL, 1, '2024-07-29 13:31:07', 1, '2024-07-10 13:47:32', 0),
(6, 'Gabriel Boric', NULL, 'President of Chile', NULL, '', NULL, '5.png', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Gabriel-Boric', NULL, NULL, NULL, 6, NULL, 1, '2024-07-10 13:49:34', 1, '2024-07-10 13:49:00', 0),
(7, 'Roland Lamola', NULL, 'Minister of International Relations and Cooperation, South Africa', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(12).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Roland-Lamola', NULL, NULL, NULL, 7, NULL, 1, '2024-07-29 16:39:01', 1, '2024-07-10 14:45:17', 0),
(8, 'Prabowo Subianto', NULL, 'Minister of Defense & President-Elect Republic of Indonesia', NULL, '', NULL, '2.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Prabowo-Subianto', NULL, NULL, NULL, 3, NULL, 1, '2024-08-01 16:07:15', 1, '2024-07-10 14:48:12', 0),
(9, 'Tony Blair', NULL, 'Executive Chairman of Tony Blair Institute for Global Change', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(11).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Tony-Blair', NULL, NULL, NULL, 8, NULL, 1, '2024-07-29 14:20:44', 1, '2024-07-10 14:55:25', 0),
(10, 'Erick Thohir', NULL, 'Minister of State-Owned Enterprises', NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Erick-Thohir', NULL, NULL, NULL, 9, NULL, 1, '2024-07-25 12:28:53', 1, '2024-07-25 12:28:53', 0),
(11, 'Lili Yan Ing', NULL, 'Lead Advisor, Economic Research Institute for ASEAN and East Asia', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(9).png', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Lili-Yan-Ing', NULL, NULL, NULL, 10, NULL, 1, '2024-07-26 11:43:39', 1, '2024-07-26 11:43:39', 0),
(12, 'Allan Robert I. Sicat', NULL, 'Executive Director, Microfinance Council of the Philippines', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(7).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Allan-Robert-I-Sicat', NULL, NULL, NULL, 11, NULL, 1, '2024-07-29 11:27:36', 1, '2024-07-26 11:49:22', 0),
(13, 'Alok Misra', NULL, 'CEO of the Microfinance Insitutions Network', NULL, '', NULL, '12.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Alok-Misra', NULL, NULL, NULL, 12, NULL, 1, '2024-07-28 11:37:27', 1, '2024-07-26 11:51:18', 0),
(14, 'AKM Saiful Majid', NULL, 'Chairman of Grameen Bank', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(6)1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'AKM-Saiful-Majid', NULL, NULL, NULL, 13, NULL, 1, '2024-07-29 12:42:39', 1, '2024-07-26 11:52:58', 0),
(15, 'Heather Lynn Taylor Strauss', NULL, 'Economic Affairs Officer of UNESCAP', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(8).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Heather-Lynn-Taylor-Strauss', NULL, NULL, NULL, 14, NULL, 1, '2024-07-29 15:08:04', 1, '2024-07-26 11:54:04', 0),
(16, 'Shunta Yamaguchi', NULL, 'Policy Analyst of the Environment and Economy Integration Division, OECD Environment Directorate', NULL, '', NULL, '16.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Shunta-Yamaguchi', NULL, NULL, NULL, 15, NULL, 1, '2024-07-29 12:33:24', 1, '2024-07-28 11:43:34', 0),
(17, ' Bady Baldé', NULL, 'Deputy Executive Director of the Extractive Industry Transparency Initiative', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(9).jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Bady-Baldé', NULL, NULL, NULL, 16, NULL, 1, '2024-08-03 15:05:15', 1, '2024-07-28 11:45:35', 0),
(18, 'Aria Widyanto', NULL, 'Chief of Risk & Sustainability Officer of Amartha', NULL, '', NULL, '14.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Aria-Widyanto', NULL, NULL, NULL, 17, NULL, 1, '2024-07-29 15:27:48', 1, '2024-07-29 15:27:48', 0),
(19, 'Hendrique Pacini', NULL, 'Economic Affairs Officer, UNCTAD', NULL, '', NULL, '15.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Hendrique-Pacini', NULL, NULL, NULL, 18, NULL, 1, '2024-07-29 15:31:07', 1, '2024-07-29 15:31:07', 0),
(20, 'Carlos María Correa', NULL, 'Executive Director of the South Centre', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(3)1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Carlos-María-Correa', NULL, NULL, NULL, 19, NULL, 1, '2024-07-29 15:56:38', 1, '2024-07-29 15:56:38', 0),
(21, 'Wang Wentao', NULL, 'Minister of Commerce, People\'s Republic of China', NULL, '', NULL, '4.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Wang-Wentao', NULL, NULL, NULL, 20, NULL, 1, '2024-07-29 16:30:01', 1, '2024-07-29 16:28:22', 0),
(22, 'Maisa Rojas Corradi', NULL, 'Minister of the Environment, Republic of Chile', NULL, '', NULL, '6.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Maisa-Rojas-Corradi', NULL, NULL, NULL, 21, NULL, 1, '2024-07-29 16:31:51', 1, '2024-07-29 16:31:51', 0),
(349, ' Arifin Tasrif', NULL, 'Minister of Energy and Mineral Resources, Republic of Indonesia', NULL, '', NULL, '23.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Arifin-Tasrif', NULL, NULL, NULL, 22, NULL, 1, '2024-08-01 16:58:51', 1, '2024-08-01 16:57:53', 0),
(350, 'Adnan Mazarei', NULL, 'Nonresident Senior Felow of Peterson Institute for International Economic', NULL, '', NULL, '251.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Adnan-Mazarei', NULL, NULL, NULL, 23, NULL, 1, '2024-08-01 17:15:35', 1, '2024-08-01 17:10:42', 0),
(351, 'Almo Pradana', NULL, ' Director Climate, Energy, Cities, and the Ocean of World Resource Institute Indonesia', NULL, '', NULL, '26.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Almo-Pradana', NULL, NULL, NULL, 24, NULL, 1, '2024-08-02 16:18:36', 1, '2024-08-01 17:22:59', 0),
(352, 'Riza Damanik', NULL, 'Chairman of the Board of Supervisors of Indonesia Traditional Fisheries Union', NULL, '', NULL, '24.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Riza-Damanik', NULL, NULL, NULL, 25, NULL, 1, '2024-08-01 17:25:48', 1, '2024-08-01 17:25:48', 0),
(353, 'Bambang P.S. Brodjonegoro', NULL, 'Former Minister of National Development Planning, Republic of Indonesia', NULL, '', NULL, '281.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Bambang-PS-Brodjonegoro', NULL, NULL, NULL, 26, NULL, 1, '2024-08-01 22:21:00', 1, '2024-08-01 22:21:00', 0),
(354, 'Nardos Bekele-Thomas', NULL, 'CEO & Director of the Micro Finance Network, AUDA NEPAD', NULL, '', NULL, '291.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Nardos-Bekele-Thomas', NULL, NULL, NULL, 27, NULL, 1, '2024-08-01 22:23:31', 1, '2024-08-01 22:23:31', 0),
(355, 'Teten Masduki', NULL, 'Minister of Cooperatives and Small and Medium Enterprises, Republic of Indonesia', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(13)1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Teten-Masduki', NULL, NULL, NULL, 28, NULL, 1, '2024-08-02 15:28:50', 1, '2024-08-02 15:28:50', 0),
(356, 'Yogie Arry', NULL, 'Founder Berikan Protein Initiative', NULL, '', NULL, 'Photo_Frame_HLF_MSP4.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Yogie-Arry', NULL, NULL, NULL, 29, NULL, 1, '2024-08-02 16:32:34', 1, '2024-08-02 16:32:34', 0),
(357, 'Thomas Mangieri', NULL, 'Policy Specialist Panel, Quadrant Strategies', NULL, '', NULL, 'Photo_Frame_HLF_MSP_(1)1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Thomas-Mangieri', NULL, NULL, NULL, 30, NULL, 1, '2024-08-02 16:37:57', 1, '2024-08-02 16:37:57', 0),
(358, 'Erik Wijkström', NULL, 'Head of Technical Barriers to Trade in the WTO Trade and Environment Division', NULL, '', NULL, '332.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Erik-Wijkström', NULL, NULL, NULL, 31, NULL, 1, '2024-08-03 14:33:52', 1, '2024-08-03 13:51:56', 0),
(359, 'Kim Eric Bettcher', NULL, 'Director for Policy and Program Learning of Center for International Private Enterprises (CIPE)', NULL, '', NULL, '34.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Kim-Eric-Bettcher', NULL, NULL, NULL, 32, NULL, 1, '2024-08-03 13:53:37', 1, '2024-08-03 13:53:37', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_travel`
--

CREATE TABLE `kg_travel` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_eng` varchar(255) DEFAULT NULL,
  `headline` text DEFAULT NULL,
  `headline_eng` text DEFAULT NULL,
  `contents` longtext NOT NULL,
  `contents_eng` longtext DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image_mobile` varchar(255) DEFAULT NULL,
  `title_image` varchar(255) DEFAULT NULL,
  `title_image_mobile` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_desc` text DEFAULT NULL,
  `seo_title_eng` varchar(255) DEFAULT NULL,
  `seo_desc_eng` text DEFAULT NULL,
  `is_publish` tinyint(4) NOT NULL DEFAULT 0,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0,
  `slug` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `warna_head` varchar(255) DEFAULT NULL,
  `warna_caption` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 20,
  `publish_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_delete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_travel`
--

INSERT INTO `kg_travel` (`id`, `title`, `title_eng`, `headline`, `headline_eng`, `contents`, `contents_eng`, `image`, `image_mobile`, `title_image`, `title_image_mobile`, `seo_title`, `seo_desc`, `seo_title_eng`, `seo_desc_eng`, `is_publish`, `is_featured`, `slug`, `link`, `warna_head`, `warna_caption`, `urutan`, `publish_date`, `modify_user_id`, `modify_date`, `create_user_id`, `create_date`, `is_delete`) VALUES
(1, 'The last paradise on Earth...', NULL, NULL, NULL, '<p>Explore the enchanting beauty of Bali, where every corner unveils a paradise waiting to be discovered. Known for its stunning landscapes and vibrant culture, Bali captivates with its pristine beaches, lush rice terraces, and mystical temples. Imagine waking up to the gentle rustle of palm leaves, surrounded by azure waters that beckon you to dive into their warmth.</p>\r\n\r\n<p>For adventure seekers, Bali presents an array of activities&mdash;from surfing the legendary waves of Kuta Beach to trekking through the volcanic landscapes of Mount Batur at sunrise. Dive into crystal-clear waters to discover vibrant coral reefs teeming with marine life, or indulge in a traditional Balinese massage to rejuvenate your senses.</p>\r\n\r\n<p>As the sun sets, Bali transforms into a magical realm illuminated by flickering torchlights and vibrant nightlife. Savor the flavors of local cuisine, from spicy satay to aromatic nasi goreng, and witness traditional dance performances that tell tales of ancient legends. Discover Bali&mdash;an island that leaves an indelible mark on your heart and soul, where every visit unveils new wonders and reaffirms its status as a timeless destination for travelers seeking beauty, adventure, and serenity.</p>\r\n', NULL, 'bali4.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'The-last-paradise-on-Earth', NULL, NULL, NULL, 1, NULL, 1, '2024-08-02 17:01:56', 999, '2024-07-09 22:34:14', 0),
(2, 'Intercon', NULL, NULL, NULL, '<p style=\"text-align:center\"><span style=\"font-size:18px\"><strong>Welcoming Dinner: Imperial Grand Ballroom, Jimbaran Convention Center<br />\r\nInterContinental Bali Resort</strong></span></p>\r\n\r\n<p style=\"text-align:center\">We are delighted to announce the upcoming Welcoming Dinner for the High-Level Forum on Multi-Stakeholder Partnerships (HLF MSP 2024), set to take place at the Imperial Grand Ballroom of The Jimbaran Convention Center, one of the most renowned and enduring beachfront resorts built on the beautiful shores of Jimbaran Bay, overlooking the picturesque sunsets. This prestigious event, scheduled for September 1-3, 2024, will be graced by the President of the Republic of Indonesia along with distinguished international guests attending the HLF MSP. The dinner aims to foster camaraderie and reinforce the spirit of collaboration essential to the success of HLF MSP 2024, highlighting Bali&#39;s role as a hub for meaningful global dialogue and partnership building.</p>\r\n', NULL, 'grand_ballroom.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Intercon', NULL, NULL, NULL, 2, NULL, 1, '2024-08-02 16:58:45', 999, '2024-07-09 22:38:02', 0),
(3, 'Mulia', NULL, NULL, NULL, '<p style=\"text-align:center\"><span style=\"font-size:18px\"><strong>Joint Opening Session: The Mulia Bali</strong><br />\r\n<strong>Kawasan Pariwisata Nusa Dua, Benoa</strong></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"color:#000000\">Set along a secluded 1-kilometre white sand beach, the Mulia is a multi-award-winning suite accommodation. The Joint Opening Ceremony of HLF MSP 2024 and IAF II will take place in this venue.</span><span style=\"color:#000000\"> </span><span style=\"color:#000000\">The Mulia Bali is situated around 15 kilometers from the I Gusti Ngurah Rai International Airport and around 10 minutes from the Bali International Convention Center (BICC) as the main venue for HLF MSP 2024.</span></p>\r\n', NULL, 'mulia.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Mulia', NULL, NULL, NULL, 3, NULL, 1, '2024-08-02 16:58:52', 999, '2024-07-09 22:38:28', 0),
(4, 'BICC', NULL, NULL, NULL, '<p style=\"text-align:center\"><span style=\"font-size:18px\"><strong>Main Venue: Bali International Convention Center (BICC)<br />\r\nKawasan Pariwisata Nusa Dua, Benoa</strong></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"color:#000000\">Bali International Convention Centre (BICC) is internationally renowned conference facilities in the southernmost tip of Bali. Located in a secluded enclave with access control by private security in the exclusive conference square and just 10 kilometres from Ngurah Rai International Airport, and 25 minutes from the Kuta, Legian, and Seminyak districts. The BICC will be designated as the main venue of the High-Level Plenary, Parallel Thematic Sessions, Special Sessions and Side Events, as well as Exhibitions and Bilateral Meetings</span><strong>.</strong></p>\r\n', NULL, 'bicc.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'BICC', NULL, NULL, NULL, 4, NULL, 1, '2024-08-02 17:05:09', 999, '2024-07-09 22:38:49', 0),
(5, 'Taman Bhagawan', NULL, NULL, NULL, '<p style=\"text-align:center\"><span style=\"font-size:18px\"><strong>Cultural Event: Taman Bhagawan<br />\r\nJl. Pratama No.70, Benoa, Kuta Selatan</strong></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"color:#000000\">Taman Bhagawan is a unique private venue that captures the best of Indonesian culture combined with contemporary sophistication. Hand-carved joglos, intricately designed buildings and beautiful Balinese statues and fountains are set among sweeping lush green lawns and tropical gardens adjoining the picturesque white sands of Nusa Dua</span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"color:#000000\">After a day of participating in a series of forums, guests can gather in this private garden and enjoy a variety of dishes and snacks from all over the archipelago, watch exclusive performances showcasing Indonesian culture, as well as the opportunity to mingle and expand networks between the participants. The Cultural Event in Taman Bhagawan will be open to all HLF MSP Participants</span></p>\r\n', NULL, 'thaman_bhagawan.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Taman-Bhagawan', NULL, NULL, NULL, 5, NULL, 1, '2024-08-02 16:59:36', 999, '2024-07-09 22:39:13', 0),
(6, 'Other Information', NULL, NULL, NULL, '<p><span style=\"color:#000000\">Time Zone&nbsp;</span></p>\r\n\r\n<p><span style=\"color:#000000\">The local time in Bali is Central Indonesia Time (UTC+8).&nbsp;&nbsp;</span></p>\r\n\r\n<p><span style=\"color:#000000\">Weather and Climate</span></p>\r\n\r\n<p><span style=\"color:#000000\">The average maximum daytime temperature of Bali during June-September lies at 29/26&deg;C (83/79 F). Rainfall is moderate with an average of 29/26&deg;C (4.03 inches).&nbsp;</span></p>\r\n\r\n<p><span style=\"color:#000000\">Currency and Banking&nbsp;</span></p>\r\n\r\n<p><span style=\"color:#000000\">The currency in Indonesia is the Indonesian Rupiah (Rp). The government regulates that all transactions done in Indonesia must use Rupiah as legal tender. Authorized money changers are available at the airport and near the meeting venue.&nbsp;</span></p>\r\n', NULL, 'uluwatu.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'Other-Information', NULL, NULL, NULL, 6, NULL, 1, '2024-08-02 17:07:33', 999, '2024-07-09 22:39:49', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_type_congress`
--

CREATE TABLE `kg_type_congress` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `modify_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_type_reg`
--

CREATE TABLE `kg_type_reg` (
  `id` tinyint(4) NOT NULL,
  `id_parents` tinyint(4) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `modify_date` datetime DEFAULT NULL,
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `create_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kg_type_reg`
--

INSERT INTO `kg_type_reg` (`id`, `id_parents`, `title`, `modify_date`, `modify_user_id`, `create_date`, `create_user_id`) VALUES
(1, NULL, 'VVIP', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, NULL, 'VIP', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, NULL, 'Government', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, NULL, 'Non-Government', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, NULL, 'DAO', NULL, 0, '2024-06-28 09:23:58', 0),
(6, NULL, 'Delegates', NULL, 0, '2024-06-28 09:23:58', 0),
(7, 3, 'Head of State', NULL, 0, '2024-07-22 17:06:17', 0),
(8, 3, 'Head of Delegation', NULL, 0, '2024-07-22 17:06:17', 0),
(9, 3, 'Staff', NULL, 0, '2024-07-22 17:13:53', 0),
(10, NULL, 'Speakers', NULL, 0, '2024-07-22 17:15:14', 0),
(11, NULL, 'Moderator', NULL, 0, '2024-07-22 17:15:14', 0),
(12, NULL, 'Participant', NULL, 0, '2024-07-22 17:15:21', 0),
(13, 4, 'International Organization', NULL, 0, '2024-07-26 09:29:04', 0),
(14, 4, 'Non-Government Organization', NULL, 0, '2024-07-26 09:29:04', 0),
(15, 4, 'Private', NULL, 0, '2024-07-26 09:29:20', 0),
(16, 4, 'Philantrophy', NULL, 0, '2024-07-26 09:29:20', 0),
(17, NULL, 'Security Officers', NULL, 0, '2024-08-02 16:14:18', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_type_registration`
--

CREATE TABLE `kg_type_registration` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `modify_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kg_workshop`
--

CREATE TABLE `kg_workshop` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price_local_early` varchar(255) NOT NULL,
  `price_local` varchar(100) NOT NULL,
  `price_over_early` varchar(255) NOT NULL,
  `price_over` varchar(100) NOT NULL,
  `modify_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modify_user_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kg_admin`
--
ALTER TABLE `kg_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_admin_auth`
--
ALTER TABLE `kg_admin_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_admin_grup`
--
ALTER TABLE `kg_admin_grup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_admin_log`
--
ALTER TABLE `kg_admin_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_banner`
--
ALTER TABLE `kg_banner`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kg_calender`
--
ALTER TABLE `kg_calender`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kg_calender_cat`
--
ALTER TABLE `kg_calender_cat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kg_calender_lokasi`
--
ALTER TABLE `kg_calender_lokasi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kg_config`
--
ALTER TABLE `kg_config`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_config_global`
--
ALTER TABLE `kg_config_global`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_config_language`
--
ALTER TABLE `kg_config_language`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_contents`
--
ALTER TABLE `kg_contents`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kg_country`
--
ALTER TABLE `kg_country`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_countrycode`
--
ALTER TABLE `kg_countrycode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_countrycode_old`
--
ALTER TABLE `kg_countrycode_old`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_country_old`
--
ALTER TABLE `kg_country_old`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_dashboard`
--
ALTER TABLE `kg_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_dokumen`
--
ALTER TABLE `kg_dokumen`
  ADD PRIMARY KEY (`id`,`id_lang`),
  ADD KEY `title` (`title`);

--
-- Indeks untuk tabel `kg_dokumen_category`
--
ALTER TABLE `kg_dokumen_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_hotel`
--
ALTER TABLE `kg_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_invoice`
--
ALTER TABLE `kg_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_kurs`
--
ALTER TABLE `kg_kurs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_leaders`
--
ALTER TABLE `kg_leaders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kg_member`
--
ALTER TABLE `kg_member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_member_dao`
--
ALTER TABLE `kg_member_dao`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_member_temp`
--
ALTER TABLE `kg_member_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_menu`
--
ALTER TABLE `kg_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_menu_admin`
--
ALTER TABLE `kg_menu_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_nametag`
--
ALTER TABLE `kg_nametag`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_nationality`
--
ALTER TABLE `kg_nationality`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_news`
--
ALTER TABLE `kg_news`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kg_news_cat`
--
ALTER TABLE `kg_news_cat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kg_partners`
--
ALTER TABLE `kg_partners`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kg_propinsi`
--
ALTER TABLE `kg_propinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_reg_no`
--
ALTER TABLE `kg_reg_no`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indeks untuk tabel `kg_side_event`
--
ALTER TABLE `kg_side_event`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kg_side_event_dao`
--
ALTER TABLE `kg_side_event_dao`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kg_simposium`
--
ALTER TABLE `kg_simposium`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_simposium_kat`
--
ALTER TABLE `kg_simposium_kat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_speakers`
--
ALTER TABLE `kg_speakers`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kg_travel`
--
ALTER TABLE `kg_travel`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kg_type_congress`
--
ALTER TABLE `kg_type_congress`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_type_reg`
--
ALTER TABLE `kg_type_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_type_registration`
--
ALTER TABLE `kg_type_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kg_workshop`
--
ALTER TABLE `kg_workshop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kg_admin`
--
ALTER TABLE `kg_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kg_admin_auth`
--
ALTER TABLE `kg_admin_auth`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kg_admin_grup`
--
ALTER TABLE `kg_admin_grup`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kg_admin_log`
--
ALTER TABLE `kg_admin_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `kg_banner`
--
ALTER TABLE `kg_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;

--
-- AUTO_INCREMENT untuk tabel `kg_calender`
--
ALTER TABLE `kg_calender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT untuk tabel `kg_calender_cat`
--
ALTER TABLE `kg_calender_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kg_calender_lokasi`
--
ALTER TABLE `kg_calender_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kg_config`
--
ALTER TABLE `kg_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `kg_config_global`
--
ALTER TABLE `kg_config_global`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kg_config_language`
--
ALTER TABLE `kg_config_language`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kg_contents`
--
ALTER TABLE `kg_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kg_country`
--
ALTER TABLE `kg_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT untuk tabel `kg_countrycode`
--
ALTER TABLE `kg_countrycode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT untuk tabel `kg_countrycode_old`
--
ALTER TABLE `kg_countrycode_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT untuk tabel `kg_country_old`
--
ALTER TABLE `kg_country_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT untuk tabel `kg_dashboard`
--
ALTER TABLE `kg_dashboard`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kg_dokumen`
--
ALTER TABLE `kg_dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kg_dokumen_category`
--
ALTER TABLE `kg_dokumen_category`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kg_hotel`
--
ALTER TABLE `kg_hotel`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kg_invoice`
--
ALTER TABLE `kg_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kg_kurs`
--
ALTER TABLE `kg_kurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=982;

--
-- AUTO_INCREMENT untuk tabel `kg_leaders`
--
ALTER TABLE `kg_leaders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT untuk tabel `kg_member`
--
ALTER TABLE `kg_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `kg_member_dao`
--
ALTER TABLE `kg_member_dao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kg_member_temp`
--
ALTER TABLE `kg_member_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=681;

--
-- AUTO_INCREMENT untuk tabel `kg_menu`
--
ALTER TABLE `kg_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kg_menu_admin`
--
ALTER TABLE `kg_menu_admin`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `kg_nametag`
--
ALTER TABLE `kg_nametag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kg_nationality`
--
ALTER TABLE `kg_nationality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT untuk tabel `kg_news`
--
ALTER TABLE `kg_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=818;

--
-- AUTO_INCREMENT untuk tabel `kg_news_cat`
--
ALTER TABLE `kg_news_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kg_partners`
--
ALTER TABLE `kg_partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kg_propinsi`
--
ALTER TABLE `kg_propinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `kg_side_event`
--
ALTER TABLE `kg_side_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `kg_side_event_dao`
--
ALTER TABLE `kg_side_event_dao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kg_simposium`
--
ALTER TABLE `kg_simposium`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kg_simposium_kat`
--
ALTER TABLE `kg_simposium_kat`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kg_speakers`
--
ALTER TABLE `kg_speakers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT untuk tabel `kg_travel`
--
ALTER TABLE `kg_travel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kg_type_congress`
--
ALTER TABLE `kg_type_congress`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kg_type_reg`
--
ALTER TABLE `kg_type_reg`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kg_type_registration`
--
ALTER TABLE `kg_type_registration`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kg_workshop`
--
ALTER TABLE `kg_workshop`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
