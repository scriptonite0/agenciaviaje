-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2023 a las 22:39:20
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_agencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto`
--

CREATE TABLE `boleto` (
  `id_boleto` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `hora_viaje` int(20) NOT NULL,
  `fecha_viaje` date NOT NULL,
  `estado_boleto` varchar(40) NOT NULL,
  `hora_registro_boleto` varchar(20) NOT NULL,
  `fecha_registro_boleto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `boleto`
--

INSERT INTO `boleto` (`id_boleto`, `id_ruta`, `id_cliente`, `hora_viaje`, `fecha_viaje`, `estado_boleto`, `hora_registro_boleto`, `fecha_registro_boleto`) VALUES
(1, 3, 1, 1, '2023-05-31', 'EN USO', '10:41 AM', '2023-05-31'),
(2, 4, 1, 6, '2023-06-01', 'USADO', '10:41 AM', '2023-05-31'),
(7, 1, 1, 4, '2023-06-09', 'PENDIENTE', '08:58 AM', '2023-06-01'),
(8, 7, 1, 4, '2023-06-09', 'PENDIENTE', '08:58 AM', '2023-06-01'),
(9, 1, 1, 7, '2023-06-11', 'PENDIENTE', '10:06 AM', '2023-06-01'),
(10, 1, 5, 1, '2023-06-21', 'PENDIENTE', '10:40 AM', '2023-06-01'),
(11, 2, 5, 7, '2023-06-22', 'PENDIENTE', '10:40 AM', '2023-06-01'),
(12, 1, 1, 6, '2023-06-20', 'PENDIENTE', '14:02 PM', '2023-06-01'),
(13, 2, 1, 8, '2023-06-21', 'PENDIENTE', '14:02 PM', '2023-06-01'),
(14, 3, 5, 9, '2023-06-22', 'PENDIENTE', '14:11 PM', '2023-06-01'),
(15, 7, 5, 3, '2023-06-22', 'PENDIENTE', '14:11 PM', '2023-06-01'),
(16, 3, 3, 1, '2023-06-15', 'PENDIENTE', '23:05 PM', '2023-06-01'),
(17, 3, 3, 1, '2023-06-15', 'PENDIENTE', '23:05 PM', '2023-06-01'),
(18, 7, 8, 1, '2023-06-14', 'PENDIENTE', '23:06 PM', '2023-06-01'),
(19, 3, 5, 1, '2023-06-21', 'PENDIENTE', '07:33 AM', '2023-06-02'),
(20, 4, 5, 1, '2023-06-22', 'PENDIENTE', '07:33 AM', '2023-06-02'),
(21, 1, 14, 5, '2023-06-18', 'PENDIENTE', '14:58 PM', '2023-06-02'),
(22, 2, 14, 8, '2023-06-25', 'PENDIENTE', '14:58 PM', '2023-06-02'),
(23, 6, 18, 6, '2023-06-20', 'PENDIENTE', '09:39 AM', '2023-06-03'),
(24, 3, 16, 5, '2023-06-15', 'PENDIENTE', '09:44 AM', '2023-06-03'),
(25, 4, 16, 6, '2023-06-21', 'PENDIENTE', '09:44 AM', '2023-06-03'),
(26, 2, 22, 3, '2023-06-08', 'PENDIENTE', '10:25 AM', '2023-06-03'),
(27, 2, 50, 9, '2023-06-10', 'PENDIENTE', '10:51 AM', '2023-06-03'),
(28, 1, 50, 8, '2023-06-14', 'PENDIENTE', '10:51 AM', '2023-06-03'),
(29, 1, 50, 8, '2023-06-14', 'PENDIENTE', '10:51 AM', '2023-06-03'),
(30, 6, 48, 5, '2023-06-06', 'EN USO', '10:54 AM', '2023-06-03'),
(31, 6, 48, 5, '2023-06-06', 'EN USO', '10:54 AM', '2023-06-03'),
(32, 3, 28, 3, '2023-06-06', 'EN USO', '10:57 AM', '2023-06-03'),
(33, 3, 28, 3, '2023-06-06', 'EN USO', '10:57 AM', '2023-06-03'),
(34, 3, 28, 3, '2023-06-06', 'EN USO', '10:57 AM', '2023-06-03'),
(35, 6, 35, 4, '2023-06-30', 'PENDIENTE', '10:59 AM', '2023-06-03'),
(36, 3, 42, 5, '2023-06-21', 'PENDIENTE', '11:00 AM', '2023-06-03'),
(37, 3, 42, 5, '2023-06-21', 'PENDIENTE', '11:00 AM', '2023-06-03'),
(38, 1, 47, 5, '2023-06-10', 'PENDIENTE', '11:00 AM', '2023-06-04'),
(39, 1, 19, 2, '2023-06-06', 'EN USO', '11:56 AM', '2023-06-04'),
(40, 1, 19, 2, '2023-06-06', 'EN USO', '11:56 AM', '2023-06-04'),
(41, 1, 19, 2, '2023-06-06', 'EN USO', '11:56 AM', '2023-06-04'),
(42, 3, 23, 8, '2023-06-15', 'PENDIENTE', '11:57 AM', '2023-06-04'),
(43, 3, 23, 8, '2023-06-15', 'PENDIENTE', '11:57 AM', '2023-06-04'),
(44, 4, 23, 6, '2023-06-19', 'PENDIENTE', '11:57 AM', '2023-06-04'),
(45, 4, 23, 6, '2023-06-19', 'PENDIENTE', '11:57 AM', '2023-06-04'),
(46, 6, 32, 7, '2023-06-07', 'PENDIENTE', '12:07 PM', '2023-06-04'),
(47, 6, 32, 7, '2023-06-07', 'PENDIENTE', '12:07 PM', '2023-06-04'),
(48, 3, 37, 5, '2023-06-11', 'PENDIENTE', '12:07 PM', '2023-06-04'),
(49, 3, 37, 5, '2023-06-11', 'PENDIENTE', '12:07 PM', '2023-06-04'),
(50, 2, 43, 5, '2023-06-09', 'PENDIENTE', '12:08 PM', '2023-06-04'),
(51, 1, 43, 7, '2023-06-09', 'PENDIENTE', '12:08 PM', '2023-06-04'),
(52, 7, 39, 4, '2023-06-08', 'PENDIENTE', '12:12 PM', '2023-06-04'),
(53, 2, 1, 4, '2023-06-13', 'PENDIENTE', '12:22 PM', '2023-06-04'),
(54, 3, 4, 6, '2023-06-07', 'PENDIENTE', '12:24 PM', '2023-06-05'),
(55, 3, 4, 6, '2023-06-07', 'PENDIENTE', '12:24 PM', '2023-06-06'),
(56, 3, 11, 7, '2023-06-08', 'PENDIENTE', '12:25 PM', '2023-06-05'),
(57, 3, 17, 4, '2023-06-22', 'PENDIENTE', '12:27 PM', '2023-06-05'),
(58, 3, 17, 4, '2023-06-22', 'PENDIENTE', '12:27 PM', '2023-06-05'),
(59, 6, 21, 4, '2023-06-22', 'PENDIENTE', '12:27 PM', '2023-06-05'),
(60, 1, 25, 7, '2023-06-11', 'PENDIENTE', '12:27 PM', '2023-06-05'),
(61, 1, 25, 7, '2023-06-11', 'PENDIENTE', '12:27 PM', '2023-06-05'),
(62, 6, 15, 7, '2023-06-09', 'PENDIENTE', '12:35 PM', '2023-06-05'),
(63, 6, 15, 7, '2023-06-23', 'PENDIENTE', '12:35 PM', '2023-06-05'),
(64, 1, 20, 3, '2023-06-08', 'PENDIENTE', '12:36 PM', '2023-06-05'),
(65, 2, 20, 6, '2023-06-17', 'PENDIENTE', '12:36 PM', '2023-06-05'),
(66, 1, 25, 5, '2023-06-09', 'PENDIENTE', '14:03 PM', '2023-06-06'),
(67, 1, 25, 5, '2023-06-09', 'PENDIENTE', '14:03 PM', '2023-06-06'),
(68, 3, 34, 4, '2023-06-21', 'PENDIENTE', '14:14 PM', '2023-06-06'),
(69, 3, 34, 4, '2023-06-21', 'PENDIENTE', '14:14 PM', '2023-06-06'),
(70, 6, 38, 4, '2023-06-21', 'PENDIENTE', '14:17 PM', '2023-06-06'),
(71, 3, 41, 3, '2023-06-08', 'PENDIENTE', '14:17 PM', '2023-06-06'),
(72, 7, 8, 4, '2023-06-17', 'PENDIENTE', '14:18 PM', '2023-06-06'),
(73, 7, 8, 4, '2023-06-17', 'PENDIENTE', '14:18 PM', '2023-06-06'),
(74, 1, 16, 6, '2023-06-09', 'PENDIENTE', '14:35 PM', '2023-06-06'),
(75, 1, 16, 6, '2023-06-09', 'PENDIENTE', '14:35 PM', '2023-06-06'),
(76, 3, 20, 3, '2023-06-11', 'PENDIENTE', '14:35 PM', '2023-06-06'),
(77, 4, 23, 5, '2023-06-13', 'PENDIENTE', '14:36 PM', '2023-06-06'),
(78, 4, 23, 5, '2023-06-13', 'PENDIENTE', '14:36 PM', '2023-06-06'),
(79, 3, 15, 7, '2023-06-10', 'PENDIENTE', '15:04 PM', '2023-06-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` int(8) NOT NULL,
  `carnet_extranjeria` varchar(20) NOT NULL,
  `pasaporte` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `foto` longblob NOT NULL,
  `fecha_registro_cliente` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombres`, `apellidos`, `dni`, `carnet_extranjeria`, `pasaporte`, `direccion`, `telefono`, `correo`, `genero`, `foto`, `fecha_registro_cliente`) VALUES
(1, 'Jose', 'Hernandez', 12345678, '-', '-', '-', '-', '-', 'MASCULINO', 0xffd8ffe000104a46494600010100000100010000ffdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc000110800c800c803012200021101031101ffc4001d000001030501000000000000000000000003000206010405070809ffc4003e1000010302040307030203050901000000010002030411050612210731410813223251617114819115a12342c116173352622434728292b1e1f0f1d1ffc4001a010002030101000000000000000000000000030102040506ffc40026110002020104010501010101000000000000010203110412213141051322325123715261ffda000c03010002110311003f009401736458da5b7baa06068d5d40ba2dac02e51b4439a29421cd14a95c30289f17993515ac0d374d4d301c39249226816520519c8a7a68b308b901bd4936007aad759f78fb93387ef106218bc32557f3434e7bc7341e47c37fc14279e80d8f6dafb6fe855434903a5f903d57087137b67666c7aaa7a3cb2e6e0586dcb7bd6460cd2b7e4f25a5315e22666c72512d6e3f8854381bb49a9780df8008013141b28e691ead39a5a6c763cec4806deb62a9d57991977b42f1172c4b09a3cdb8848c8fcb0d5c82661fb381fcadd9963b7a5752e1f1c19832ec75758c16fa9a49b4070e85ccb1438340a699d9bddb93d8d2d1bad3990bb55e48ceb87cd3c9587089e06974b056d98761c81beeb6965accb8666dc3995d8656c3574cfe4e8dc09baa3e0b651927f94a09e88e45c1086f60164123124924009509b0555422e10031c6e531fe429ee16298ff002156480039c014927b6e5256c8011cbecaa90164e6b752cb15901cd1e109c013c9506c2c9f1f33f0afb500f636cd1709e05f92a2747e60a52c00e68b0dc2b2c6b1da0cbb874b5d88d5328e922f34af0481f804abf5a4fb53678664dc98627cac6c95ed31b23bddceff005803a056035c7193b66d0fd2d5e1193e0a89a47131c98854b4471dbae966e571e6298b54e2d552cd552999f2124b9dcc9f754acab92b242f792f73cfa955a4c22a6aa50191eb6754cf8aede0af32784b25937cc024d0e6c7717712fbdbd94a62c8f5f206ba2a57026f607aa343913160d1aa91f1fc8df9a3dead7522ef477be7691264cf1237c246e88f9c32525ed163ea14fb0ce185757c8d3243a77ddce1659dc638305d47fc09582a74dc82d36b7ca44f574a78721b0d0ded676b35132acb2dddd8106e034db7e856c0e1d71b335644c4a924a2c767a4818fd4ea723bc81e3a87b073bfa8b151da8c855542e21edb49d074bac155523a91f6998750dbd2deeb4d76427c27933595db57dd60f50b83bc61c338b997a2aea57b60c422f0d5d2176f19f568ead3ceeb61daf6dba2f37bb2c66cacc2b889052d3d549119c585a52d6bb4f3d4dfe6f85e905311340c95b2364648d0e6b986e0edcc754a6b0d846592b61e89587a2a91629282e09e3c453115ccb926e9ae8f48bdd592007654701a4ec9c76547794ab816d20dc249ee6ea23749463205a379844b00764d0cb58dd3d668b4900b49f429f18209dba27b3ca3e139add49802009e8896039240585939add46ca40b1c66a1d498456ce266d318e273fbe70be8001bbadd6cbccae29e6c9f34670aea99b12aac45ae90b6296a5dfcbea0721ff95e88f16309c4b16c9f5d4d87d7fd0b1f13fbe2c6f89e349d81e8179858a44e86a24634ea3eaedca65787921f41b2fe15fab628d8c5b40dcfb2dd39672dc5142d6320b0dae7dd6b6e1a42c3893ee2e4b56fec1a9991425c00b91b2e07a8dd28cd43c1e9fd2a88bab7e392e70cc2fc2c7777760dada761eeb25160a6537745e0bed66ac943571c2c0db35a34fa2bb8673281a7cbecb8f88ffd1e93698dfd1d9032ce88b0b8ab6aec0647f879823937d167eb4b031af3a9cef956dfa83246f76ebb4df9f54382efb2cfaca357663ca64891ce6ee09b5c725a833fe03f4cd0f70df6e61749e3510744fd4755cdc2d41c4da03514d29647a98d009b7307d5747456385a97838fea14ab696fc9abb24e24ccbd9bb0ac465d51c54f531c8f2db83a0386ab7fcb75eb4617534f8861b4d554443e8e7636589cd6f363802ddfd2d6fbaf202ce649a092f1cae3a03b2f49bb216719b37703f08fa87ba4a8c3e47d0171ead65b4fec405e9ace7e4787ad632bf0dc5a3d5a9ae6fa05785898e8c387876237dd5160616763e8a845f9a314cd1ee9800f40f44273763b755716f1e9f6ba63fc85005b3dbe8124f3cd2401629f1b43af70a91f9823058804d03608a1a0724c6b4ec511314bc0080460c00ec1523f284f02e6c98002ba8db5d4353011fe2c4f66fe85a57935985868f1a9e23cdb23da3ec485eb26251492514ec8c78e48cc608e6db822ff006baf2c789795eb32ae6ac4b0eafb8aaa69c87dfafa11ea0a9abec43e8bce18c23eae798f268175bae8b1da78da232f6823723ad969bc98c752e5d96a63617ccf3a00eb7f6531cbd91eb2b5c67c42b853b24b921d7b95c9d4c236cf7499e8f4d63a29515c9b5f0eaa86af76bee3adc2cfd361fdeb1cf89c74b79eeb537f64a1a59dbf4598184ed685ad3777dc1e414969317afc1211df481d03881a83ae0958aca215f2752bbe736925c13d7534462d6e90b9ad1670f436519aacc3434904525dce32eedd0dd647d958d666b32d83cd9a4f363ac563e5c1b0fc122a774a2a2aa431b5a191df4dedb6c399f851546b9f6b25ef9d90fabc18dc6f3e358c7911c9334388ff000edb28bff68e931b9a689ae3adecd2e0f1b0f6521933fe5b7864230c943a4648e69ee8d9c18e2d79f6b1041b80ac6ab05c3b34d2fd6613a5b230ea0d8ed716e6365a7dbae12e63830abec9aef28d1d9a30cfd2b1d9a0274dc87308f42576bf601966feeef30c2f717431e280b3d8989b7ffb05c99c4fc3df1545154b9a7bc2d2cb75d5ff00d5da5d857088a87831354b08ef2b31196470d42e1ac0d636e2fb72eabb119a956b0796b20d5f33a20b8dd36f646e5d135c2e158a96cf6d9c5315c9164c78d4db04c40018d06524ff0095088bdc2b873482825a772a400bda01160922a480316cf3846090b59258802b7ca13d8dd574c6eed09fa1de89c9200a1ba4593e3f30436021a2e891f99580af88b880437c3b126c2fee7a00170476c2c329f12e225463785d553623493d342d965a595af6c6f65da43add770bbbf16a67566115d031da5f2d3cac691cc38b1c07f45e7de59c1c6299167c31ed06a22ad9e8a6dac49e609f7bb4efecb3cad74add8f26bd269dea65284bf08f70ba9e3c4f0b818f0d0c649abdc91d14af19c2717c4f1aa78a9c3461f13807b1b210e9b7dc5fa0584e19e1d5186d3cf15443ddbd93161b8b6e365b4706f0124fecb9775928d9989ded3d4e51517e0c0e5fe113706ad971096a230d2e91f142626b8303f9d9c7736e973b2a66e91b8660eca48a5926717070ef88247c596c26b259e366a75dbaac1806f72a039f203263b4d4818410dbb9bd42c93b256c9b99daaa855a497061ab2595b85b2473f959ca5d815552e28209260f654c03c13b6473740f6b723eeb1988e0351fa6b3544e8c581f10b03f1eaaeb8732115f35048c682f166b653b13d774b8ac44d56c2327c99b93875978b24aaa783b9a8987f1676583a4b924dcf5bdcdfd7e56268f2b5265b91eea28d8c6bb9e9e4a5f5782323e6c736ee26c0edc961eae07538b38ddbd15e5294fb661969e108fc0d3bc64c30cd8736763482d95b603ff007dd7487632cbefc21b51182e889a51dec0e3e725cddedf73f95a9f1ba5a5ab904756cef2073dafb7a5974470530f1459c8be9cde9aab0f74800362db69b7ecba10b1fc2113816d31feb366f5eec589d5a89dee8651f7e4458a6bdb7b582ed4bbe0f3b1eb900e683ba1a3104129ae171b28592c07407137e81048b857045905cc20136ea98005cdb249eeb0e69200c63790f84f6b75263790f8448d6201ecd8808e82de6118107914f5d0154e679934220b74b5d0020d024d7d46c3db7bdd711615431e03c67cf583565e3863c466aa8d9c859c49691f6703f75dbc792e41ed43804b9278bd8766b8bc38763308a69dc1be113b0069bfc8d1f669f448ba0e75b8a36e8ed74ea14fc74447180c8b32623dd1063efdce1a4edbd967b2ff008ad7def6fb28ad7c0ca5c6dec85da98f024d5aafa89e67e149b0192d33633e12485c3b561ac9e9a89af731fa4fe8d915342ca871b161d40936b2d675550e9310adad7bd9f58c7992d213791b7b00d52cccd8ab62a034c0869d2370a3786c06bdf18b122fc9270d9d4724cca56e6eacc670aa7a3a703535ba744c6e22f507658e6860fa57b9acfa8648d7cae82f663bafc853bc372f323a36c6e8dad3236fa8d946f19a3fa7d41ae176b880e055e50dab2d8a5649be512c87148b11a7bbbc4e1b027aa8d63acd17bec7d162b0dab9a2a90dd3e437b0e6e59fc6da2b2899381604d890a8d35d91396560d7b8d87b879773b0f75d09d9d62a9a8cd15ae9897b69a85acd5d2ee2006fe012b4e3301971fcc9856194c18f9aaa56c71b5eeb349e7b9f4d975d70d787f1e41c0cc0f7c73e233b8c93cacbdb9ecd1ecba7445cf6e3c1e7b53355c64a5db2504ea20fa807f64914c62d706d616010ec7d176b1c23cf25804ff3143447b4ea3b14c2d239852960906fe686ff002145b1ef771b590de2ed2a4003dbaae12557020f24900629bc87c224686de43e1123596293ec07a7c7ccfc2627c7ccfc21379c0054f6b749ba627b1c4b8029a0396033ef0fb08e24e58a8c131b804d4720d6d2c3a648a4e9231dd1c2cb3e8c5c18dd46db0bee2f742e1939c7279cf8c61559c3de25e2193b11aa7d653d03cc74d33da18e919b163b6f5fe8b63605dd475f472c86d1386e5493b6af0c6a19261fc40c2e3d4fa12d83100de6371ddc9f17f0fdd6adc8b9b22c528a28e5b1d57bff00e1737574a93dd13b7a3b7771e51b231ccaf2358f74734603dba98e93905ae30dc42ba0c5dd1e292bdf08769ff62d881eab63d763063a6861d435801c1a4ece6fcac7c18553e27506405be237e5b2e32b5d4f123d04126cb9a7acc26a9cd6c32e60a9841b7741c46bf8f4fca8ae6861ad9bbac330baaa37b1dbcd5350e73c8f4d3c94e64c25b4a18c8abbbb8c1dc34816591a4a7a231b84720964ea5d6dcff54f76ac70322d27d49ffa4372660b55471096beaa59a43c98f22ca558bb18dc2e38d845cddc7db758cc524146261d5a09041e4b1b558e454d846b778a57374804acd094a72f909bec8c39c609d702b0238ff13a2aad01f4d8542e9dee2760e7374b07cdeeba959703c46eb50f65ec3618f871fa9774d6d557564c64775d2d3a5bf8b725b7eff65e974d175d69af2790d4dbeed8ff00f0aaa39da52ba6bf905ad36641ae372992791393643e15600479a09e68c79a09e68007279824949e609200c2b5e0d827a0b3ce1182cd24db00adf28448f99f8436f942735c5bc95d0074e8fcc10da4900a247e60a407a2b5e09b0ba12a836370a00c27117066662c8398b0c7b5ae15387cec01c2e3568bb4fd8ee179cb91e07d4613ae1718ea299f66e9e67d8fcaef7e37715e8784d916ab13aa636a6b2a2f4d4749aac6691c0deffe968dcfe171c652cb0ea4c918162da0db1192774819c878bc1fb2cba86d4328dda269dc9177066b757d0369ea1bddd642e26c06e3a587b294e5ac623960203c6ae44288e3d97a49877f131d1c806c01b6a58ec3e49e8ea1aeb39a6db9695c9554671c23b90bdd7266e7a1fa6bde4b124f51b27d754d345334c6e0d25a5a07a95ae9b8b55491831d492015675d8a5431b2175692e23983e5f8446a8e303deb2665b336638d9de431c81cfb78c9e8a3f433498c3dd2bde7b8658307a9f558934d2e2752dd882f362f3d47ba9ad3e16da1a36b580785bc874532db5470bb32a73b9fc8eaaecdb76f09f0fb8bff00b4d413ff00593fd16ce73839731f0c78a3fdda52e55a0c54b63c171c92583bf70b7d3d439e7ba27fd2f1a81f4d8f55d322f7dc5ae2f6e76decbbb4bfe71c9e6ed5fd64d154923c908c8568283dcf02e105ceb0552e24a6bfca8029ac2638d812926bfca50031ee0484934f3490060c7208b175400fbd82235fa6eb3c5e4038e68a505aeb8053f5dfd2eadfe00f06c8c2404802e49e400587c6b31e1996294d4e335f4d85d386dcc95533631fbf35a333bf6d5ca597a4929f00a59f315536ff00c523b9a71f73e23f61f8568c26cab928f6746037706f271dac4596b7e2e71ff2bf09b0d99d555916218d5c8830aa6983a42fb6c1d6be91ea4f45c6d9efb54e7ecf51494e31066054125c1a7c2818cb87a190f88ad2f34cf9273248e7492124be479bb9e7fd47aa7aad7912ec7e09bf1478b78ef167303f14c6e70ef098e0a58c5a2819fe560ffb9ea45caeabe19605066ae12e1343a9b1b25a389f0c87711cade561e848dd70d9909781e8bb5fb27e391e2d9069691e41968a77c2e6df7b6e5bf6b15338a9c1c305eb9b8cd301559765a432c35103a19a2bb646116d1ffd5149b2e88aa4923c2baeb1bc8d4b9aa8a271b475cc00327239fb3bd47bad3398b275460b5b2d3d6422196fab7dda47a83d7e17999e9eca1b7e0f5156a2bb961766ad6e5c8c8b83b7b140a8c0e2636dfd14fe1c0de6377f04b0df637ba054601a1a41b9fb2536d9a215b4fe442308c1bbda96b4349b1e814e309ca55198b10868a98163bf9e52368da39b8fb8dff2b3395b2a4b58f1153c5df54bdde06346f6f5bf45b8304caf4b97f0e74310d52900cf30e6e77a7c04ea34d2ba7bbc09d4ea214476f97d1ce7da970ba6a2e1bc4d81a5b152d440c82c77681717f9364eecf3db0a3a7a7a5cb79f6a5dddc6d11d3636edf4340b06cc4ee7fe3fcab4ed938bc7065dc3f0f691de54d577ba5bfe5605c8ce71691627d0dbafb2f4fb56d515d23c86e7bb2fb3d82c3f10a6c56923aaa2a986ae9a4176cd4ef0f8cedcf5057362bca5e1d717335f0d2a9b2e5fc626a38c1bbe99c4be0937fe661dbf0ba87877dbce86a4434b9c3047d24bc9d5f85f8e33ee633e203e0a8d8df436336ceb72e00aa39c08513ca3c54ca99f616cb81e3b4588920130c5286ca2ff00e83bdfedf9526739cc1e21a4fa385ae96d35d97c8e2e039a0937fcaab9fa8a6a8258c7f30924fe612402e88d57627478552baaab6aa1a4a668de69e511b07fcc765ab733f6ace1de596bcb31876335113b48870f89cf0ef51ac8d3f75c3f9fb89b9978895efa9c73129aa06abb69b516c517b35a36fba8987d85b6fb0b2234a484fb8e3d1d4f997b7562f3be46605972928e2160c9aba574cfb7fc2db36ff75adf3276a3e236648e48dd9825a18cff00261d1b60b0f62013fbad48df15bdd15acd37dd3d47f056597d896315d8c4fdfd7564f5931e6f9e42f3fb92ad05fa75544e8fcc13a2b040d73b46c4d900ee8953bbadec84a8fb01004bc597437643cd1fa6675aac26477f0ebe1ef2317e52b39fe597fc2e7e819a9d7bf2526c918ecb93f376138d452163a8ea18f36eadbd9dfb150d345a2f07aa783d67f099bee058ff00f8aeb1acb74199a87b9ad8039edf146fe4e61b73054632f6202ae38248497c120d51bba169dc7ca9ad155374173fc36e66e9328ee7ca1d1935cc4d298ee40c4b03ac30c513aaa226ccd0dbbbeeb1b0645c6718c423a5651cb03c805ce9c16b1a3dca8d716f8d98d54674abfecdd63e0a1c39bdc3000d21ee07c4f20837bff4505cbfdadf30e039868dd8ec10d6533676f7f2e8d0e6c24d9f6d3607d7759e5e969cb7e70bf0dd1f539a8edf275ce5cc994b9568853c377d4b85a6a93cddec3d10f19a96c31c91870b8e416769712a7c5a9a1aba6787d2d444d962907f335c2ed23eca219aaa994066ab91e1b0c0d74ae2760034126eb557150f8a31ca72b1ee9bc9c2ddab3347eb1c4a9b0f88de1c3216c1a6ff00ceef13befb85a4242010167b3563d2665cc789e27238b8d6543e624f3ddc6dfb6cb033b349bdf9ad2d70667d8c89da5fb9b0570e01fb8df7e6ad5be2b2ba8b61a54453440ea79a5a09993d3c8f8666795d138b5cdf8216dfc8ddac33fe48eea138a7eb342c77fbb62adef45bd1af0350fb95a80b6e79a6491ddbcd59ae00eecc83db7329e669a0a4cc3492e59aa78d3df8fe353eaf770dc0f72b7de0d9830fcc542dacc2b10a6c4e95dca7a49448c3f70bc917b48b8079fa8b8fc290e4ee22664c8156fa8cbf8cd5617249612770eb3641e8e6f23f849d8bc978bc767aacfa82e6b5c2c5a7a820849712640edc58f619a29f3561b0e3716aff007aa670a79da0f5b01a4fe02492e3cf0394e27301f222c71b5cd170847788fb6e8f179426998ae8683b055542f1a8855568f60553cd9a2e2c36435479b34fbec9c009ce2e75c9baa305d87a95402c2c8b4edb02527c8068da1a2e058a2879277366f5f8ea841e004ee607a26b5903bfbb2be70766be19613de4baeaf0ebd04e3add9e43f7691f853ce37e69c4f2af0a3315760f03e7af8e95ddd960dd809b3dfefa5b73f2b95fb1566e387e6bc672fba5b32be9fea6063bacace76f7d25765d7b219a0959531b258256ba3ee1c2fad8ee62c92d618e5d1c119431f7629849739cc74a059fbee7dd47b39d2b58def41b8f5fbeff00b291676cad4fc1be25663c06ae534f446513d1b8efaa19007b0fee5bf6583c45f063786d44146ffa891ed258797e2eb7e77432659476c8f46303ab67770d3c4d0c87e9a19620dd86931b7501e9671d87a2d55daaf310cafc28c6e489da2a2b1a28a2d27ac9ccfd802a6b942b4cf95f2dced7074f2e1f4a5e01bdbf84d0edfe573776e7cda25aecbf96a094166935f2b475d5e165fdac1c7ee17363f7346ec1c9ee377136b6ff0084391a1cddc5d3b9ef7bfbfaaaad42cb38da43b7040f74624b6d6e7755946a23d95100146e151fe5546bc01649ce0420019683cc26b98349b0dd3d26f881f6556b2000820a49f33b4969495760000e3bb7a1450f2dd8208f32238e93629605751bdfaa231e493742bed74e8de2e50019364f2fdd2ef1a9af7823653960300bbedd11da34b480990ff888879a62c0144e6b8ec135541b1570255c35cd8ec8b9fb01c746ad14556c9240d362e65ecf1ff493f85e92d13a381a2574ce7b1d626773afaafb823d07b2f2c643a85875041f823ff4fd976260bc577d676738f142e69af869c61363d66be80e3f2db14a6b2f81a9ac1a6fb42e71873f71ab11c4a16c6688065243d75362f083f7dddf741a7a78461f50191b5af6c648205aca078bd406e3b4f7df4bc34bbd49e654ee068607b0737b74b96c8fe19e4f2753f668ce54d9ab85583c51cadfaac2daec3ea984dcb4b48b3bee02e41e3a66e9338f14b1dac323a586198d2c0e7748d86d61ed759be0b7105fc24c731c92690b686ae8e61607cb3069ee8ff45a91d50e9dee92476a7c875b8fb9dcfeeb3edc3e86369f43bf64d712150b81098a482a4dd31ee2db5939324e43e50039a6e15531af005bdd3d003247168b84d8242ebdd565dc590e31669475d80f9c5cb42498cd9e0f4b2492df200f914f937b3bd52495406ea205926732924800cd602dba6f4492401563cb0dc235ee924a57602492493c04a7592b344d1e5baecbaf24d3cd50dae60f4735a5a7f621249443ee43e88a620ffa8c7dacbf9a4173e8b64453b5cf67a90014925a21dc84119cf5136958d039cc6c08e96dd4380b7b9e57f5492549f6363d0924924b2e24c9390f94924003ea9dde9f649240142e2e286d7906c924a9301dc924924a03ffd9, '2023-04-15'),
(2, 'Juan', 'Manrique', 35697814, '', '', '', '', '', '', '', '2023-04-20'),
(3, 'Elias', 'Benites', 11223344, '-', '-', '-', '-', '-', 'MASCULINO', '', '2023-04-15'),
(4, 'Patricio', 'Felix', 76845754, '', '', '', '', '', '', '', '2023-05-31'),
(5, 'Roberto', 'Porres', 76154845, '', '', '', '', '', '', '', '2023-05-31'),
(6, 'Jennifer', 'Dulanto', 64845484, '', '', '', '', '', '', '', '2023-05-31'),
(7, 'Lucia', 'Garcia', 67845487, '', '', '', '', '', '', '', '2023-05-31'),
(8, 'Roger', 'Castillo', 65874484, '', '', '', '', '', '', '', '2023-05-31'),
(9, 'Dani', 'Duarte', 65784854, '', '', '', '', '', '', '', '2023-05-31'),
(10, 'Steve', 'Alvarado', 64548454, '', '', '', '', '', '', '', '2023-05-31'),
(11, 'Gilbert', 'Vargas', 45764578, '', '', '', '', '', '', '', '2023-05-31'),
(12, 'Roger', 'Castillo', 15485346, '1', '', '', '', '', 'FEMENINO', '', '2023-05-31'),
(13, 'Luan', 'Manrique', 45411656, 'carnet', 'pasapo', 'direc', 'telefo', 'correo', 'FEMENINO', '', '2023-05-31'),
(14, 'Pedro', 'Sanchez', 78645510, '', '', '', '986455100', '', 'FEMENINO', '', '2023-06-02'),
(15, 'Diana', 'Cevallos', 65484564, '', '', '', '', '', '', '', '2023-06-05'),
(16, 'Koki', 'Andrade', 54648415, '', '', '', '', '', '', '', '2023-06-05'),
(17, 'Fabian', 'Ortega', 56539971, '', '', '', '', '', '', '', '2023-06-05'),
(18, 'Osbaldo', 'Azucena', 69478523, '', '', '', '', '', '', '', '2023-06-05'),
(19, 'Jeyron', 'Roca', 65438777, '', '', '', '', '', '', '', '2023-06-05'),
(20, 'Jesus', 'Jimenez', 34152631, '', '', '', '', '', '', '', '2023-06-05'),
(21, 'Eduardo', 'Huerta', 56774478, '', '', '', '', '', '', '', '2023-06-05'),
(22, 'Armando', 'Saenz', 68464864, '', '', '', '', '', '', '', '2023-06-05'),
(23, 'Adela', 'Suarez', 35125423, '', '', '', '', '', '', '', '2023-06-05'),
(24, 'Silvia', 'Montenegro', 12823436, '', '', '', '', '', '', '', '2023-06-05'),
(25, 'Guillermo', 'Saavedra', 24563151, '', '', '', '', '', '', '', '2023-06-05'),
(26, 'Enrique', 'Suarez', 32546513, '', '', '', '', '', '', '', '2023-06-05'),
(27, 'Kevin', 'Paredes', 45513154, '', '', '', '', '', '', '', '2023-06-05'),
(28, 'Jhon', 'Rojas', 14515315, '', '', '', '', '', '', '', '2023-06-05'),
(29, 'Paula', 'Ramos', 54613125, '', '', '', '', '', '', '', '2023-06-05'),
(30, 'Freddy', 'Torres', 54134788, '', '', '', '', '', '', '', '2023-06-05'),
(31, 'Sebastian', 'Gonzales', 45133697, '', '', '', '', '', '', '', '2023-06-05'),
(32, 'Javier', 'Espinoza', 15131487, '', '', '', '', '', '', '', '2023-06-05'),
(33, 'Adam', 'Mendoza', 32651513, '', '', '', '', '', '', '', '2023-06-05'),
(34, 'Sergio', 'Huaman', 54681351, '', '', '', '', '', '', '', '2023-06-05'),
(35, 'Juan', 'Pinazco', 87464451, '-', '-', '-', '-', '-', '-', '', '2023-06-05'),
(36, 'Tatiana', 'Rosas', 37894123, '-', '-', '-', '-', '-', '-', '', '2023-06-05'),
(37, 'Edilson', 'Cruz', 45784123, '-', '-', '-', '-', '-', '-', '', '2023-06-05'),
(38, 'Nicolas', 'Paredes', 54878457, '-', '-', '-', '-', '-', '-', '', '2023-06-05'),
(39, 'Karol', 'Huerta', 84378643, '-', '-', '-', '-', '-', '-', '', '2023-06-05'),
(40, 'Miguel', 'Sarmiento', 78789435, '-', '-', '-', '-', '-', '-', '', '2023-06-05'),
(41, 'Gustavo', 'Mariategui', 12313842, '-', '-', '-', '-', '-', '-', '', '2023-06-05'),
(42, 'Lorenzo', 'Quineche', 67184611, '-', '-', '-', '-', '-', '-', '', '2023-06-05'),
(43, 'Sebas', 'Jaramillo', 56465484, '-', '-', '-', '-', '-', '-', '', '2023-06-05'),
(44, 'Kelly', 'Barrientos', 92612321, '-', '-', '-', '-', '-', '-', '', '2023-06-06'),
(45, 'Betty', 'Zapata', 78454845, '-', '-', '-', '-', '-', '-', '', '2023-06-06'),
(46, 'Giovanni', 'Cano', 12934299, '-', '-', '-', '-', '-', '-', '', '2023-06-06'),
(47, 'Mario', 'Villanueva', 32134942, '-', '-', '-', '-', '-', '-', '', '2023-06-06'),
(48, 'Giancarlo', 'Melgarejo', 68784578, '-', '-', '-', '-', '-', '-', '', '2023-06-06'),
(49, 'Bernardo', 'Cristan', 67848648, '-', '-', '-', '-', '-', '-', '', '2023-06-06'),
(50, 'Paolo', 'Ramos', 87984146, '-', '-', '-', '-', '-', '-', '', '2023-06-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle_venta` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_boleto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle_venta`, `id_venta`, `id_boleto`) VALUES
(1, 1, 1),
(2, 1, 2),
(7, 4, 7),
(8, 4, 8),
(9, 5, 9),
(10, 6, 10),
(11, 6, 11),
(12, 7, 12),
(13, 7, 13),
(14, 8, 14),
(15, 8, 15),
(16, 9, 16),
(17, 9, 17),
(18, 10, 18),
(19, 11, 19),
(20, 11, 20),
(21, 12, 21),
(22, 12, 22),
(23, 13, 23),
(24, 14, 24),
(25, 14, 25),
(26, 15, 26),
(27, 16, 27),
(28, 16, 28),
(29, 16, 29),
(30, 17, 30),
(31, 17, 31),
(32, 18, 32),
(33, 18, 33),
(34, 18, 34),
(35, 19, 35),
(36, 20, 36),
(37, 20, 37),
(38, 21, 38),
(39, 22, 39),
(40, 22, 40),
(41, 22, 41),
(42, 23, 42),
(43, 23, 43),
(44, 23, 44),
(45, 23, 45),
(46, 24, 46),
(47, 24, 47),
(48, 25, 48),
(49, 25, 49),
(50, 26, 50),
(51, 26, 51),
(52, 27, 52),
(53, 28, 53),
(54, 29, 54),
(55, 29, 55),
(56, 30, 56),
(57, 31, 57),
(58, 31, 58),
(59, 32, 59),
(60, 33, 60),
(61, 33, 61),
(62, 34, 62),
(63, 34, 63),
(64, 35, 64),
(65, 35, 65),
(66, 36, 66),
(67, 36, 67),
(68, 37, 68),
(69, 37, 69),
(70, 38, 70),
(71, 39, 71),
(72, 40, 72),
(73, 40, 73),
(74, 41, 74),
(75, 41, 75),
(76, 42, 76),
(77, 43, 77),
(78, 43, 78),
(79, 44, 79);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` int(8) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `foto` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombres`, `apellidos`, `dni`, `cargo`, `telefono`, `direccion`, `correo`, `foto`) VALUES
(1, 'Felipe', 'Ayala', 76297047, 'GERENTE', '978487835', '-', 'felipe1990@hotmail.com', ''),
(2, 'Juan', 'Melendes', 15958236, 'EMPLEADO DE CAJA', '-', '-', '-', 0x2d),
(11, 'Josue', 'Bustamante', 16485858, 'EMPLEADO DE CAJA', '-', '-', '-', NULL),
(14, 'Julieta', 'Bernardez', 68488545, 'EMPLEADO DE CAJA', '-', '-', '-', NULL),
(15, 'Pedro', 'Rodriguez', 35884644, 'CHOFER', '-', '-', '-', NULL),
(16, 'Luis', 'Infantes', 76894894, 'CHOFER', '978456848', '-', '-', NULL),
(17, 'Ulises', 'Sarmiento', 84567868, 'CHOFER', '945678454', '-', '-', NULL),
(18, 'Raul', 'Dominguez', 76458484, 'CHOFER', '912546454', '-', '-', NULL),
(19, 'Valentino', 'Mercedes', 98213112, 'CHOFER', '941545445', '-', '-', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora_viaje`
--

CREATE TABLE `hora_viaje` (
  `id_hora_viaje` int(11) NOT NULL,
  `descripcion_hora_viaje` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hora_viaje`
--

INSERT INTO `hora_viaje` (`id_hora_viaje`, `descripcion_hora_viaje`) VALUES
(1, '6:00 AM'),
(2, '8:00 AM'),
(3, '10:00 AM'),
(4, '12:00 PM'),
(5, '14:00 PM'),
(6, '16:00 PM'),
(7, '18:00 PM'),
(8, '20:00 PM'),
(9, '22:00 PM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `id_ruta` int(11) NOT NULL,
  `terminal_salida` varchar(40) NOT NULL,
  `terminal_llegada` varchar(40) NOT NULL,
  `ciudad_salida` varchar(40) NOT NULL,
  `ciudad_llegada` varchar(40) NOT NULL,
  `tipo_viaje` varchar(30) NOT NULL,
  `costo` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id_ruta`, `terminal_salida`, `terminal_llegada`, `ciudad_salida`, `ciudad_llegada`, `tipo_viaje`, `costo`) VALUES
(1, 'T-Lima', 'T-Huancayo', 'Lima', 'Huancayo', 'TERRESTRE', 40.00),
(2, 'T-Huancayo', 'T-Lima', 'Huancayo', 'Lima', 'TERRESTRE', 35.00),
(3, 'T.Lima', 'T. Huacho', 'Lima', 'Huacho', 'TERRESTRE', 15.00),
(4, 'T.Huacho', 'T. Lima', 'Huacho', 'Lima', 'TERRESTRE', 15.00),
(6, 'T-Lima', 'T-Tumbes', 'Lima', 'Tumbes', 'TERRESTRE', 75.00),
(7, 'T.Tumbes', 'T. Lima', 'Tumbes', 'Lima', 'TERRESTRE', 75.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `id_transporte` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `modelo_transporte` varchar(100) DEFAULT NULL,
  `placa_transporte` varchar(100) DEFAULT NULL,
  `seguro_transporte` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`id_transporte`, `id_empleado`, `modelo_transporte`, `placa_transporte`, `seguro_transporte`) VALUES
(1, 15, 'Mercedes Benz', 'A10-BX5', 'SOAT'),
(2, 16, 'Mercedes Benz', 'A1A-455', 'SOAT'),
(3, 17, 'Mercedes Benz', 'A1A-945', 'SOAT'),
(4, 18, 'Mercedes Benz', 'A1A-644', 'SOAT'),
(5, 19, 'Mercedes Benz', 'A1A-721', 'SOAT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `dni_usuario` int(8) NOT NULL,
  `password_usuario` varchar(20) NOT NULL,
  `tipo_usuario` varchar(30) NOT NULL,
  `fecha_registro_usuario` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `dni_usuario`, `password_usuario`, `tipo_usuario`, `fecha_registro_usuario`) VALUES
(1, 76297047, 'admin123', 'GERENTE', '2023-05-29'),
(2, 15958236, 'caja123', 'EMPLEADO DE CAJA', '2023-05-30'),
(3, 12345678, 'cliente123', 'CLIENTE', '2023-05-30'),
(4, 35697814, 'jmanrique', 'CLIENTE', '2023-05-30'),
(5, 11223344, '11223344', 'CLIENTE', '2023-05-30'),
(6, 16485858, '16485858', 'EMPLEADO DE CAJA', '2023-05-31'),
(7, 68488545, '68488545', 'EMPLEADO DE CAJA', '2023-05-31'),
(8, 76845754, '76felix76', 'CLIENTE', '2023-05-31'),
(9, 76154845, 'porres45', 'CLIENTE', '2023-05-31'),
(10, 64845484, 'jenni49', 'CLIENTE', '2023-05-31'),
(11, 67845487, 'luz2626', 'CLIENTE', '2023-05-31'),
(12, 65874484, 'rogerx15', 'CLIENTE', '2023-06-01'),
(13, 65784854, 'dani46565', 'CLIENTE', '2023-06-01'),
(14, 64548454, 'steve4646', 'CLIENTE', '2023-06-01'),
(15, 45764578, 'gilbert4546', 'CLIENTE', '2023-06-01'),
(16, 15485346, 'daniel98', 'CLIENTE', '2023-06-01'),
(17, 45411656, 'luana89', 'CLIENTE', '2023-06-01'),
(18, 35884644, '35884644', 'CHOFER', '2023-06-02'),
(19, 78645510, 'sanchez98', 'CLIENTE', '2023-06-02'),
(20, 65484564, 'dcevallos98', 'CLIENTE', '2023-06-02'),
(21, 54648415, 'andrade415', 'CLIENTE', '2023-06-02'),
(22, 56539971, 'fabianor', 'CLIENTE', '2023-06-02'),
(23, 69478523, 'osbaldsps', 'CLIENTE', '2023-06-02'),
(24, 65438777, 'jeyronrck', 'CLIENTE', '2023-06-02'),
(25, 34152631, '123456jz', 'CLIENTE', '2023-06-02'),
(26, 56774478, 'eduardoh', 'CLIENTE', '2023-06-02'),
(27, 68464864, 'arm1980', 'CLIENTE', '2023-06-02'),
(28, 35125423, 'adelasuarez', 'CLIENTE', '2023-06-02'),
(29, 12823436, 'silviamn', 'CLIENTE', '2023-06-02'),
(30, 24563151, 'guillermosa', 'CLIENTE', '2023-06-03'),
(31, 32546513, 'enriquesz', 'CLIENTE', '2023-06-03'),
(32, 45513154, 'kevin455', 'CLIENTE', '2023-06-03'),
(33, 14515315, 'rojas1999', 'CLIENTE', '2023-06-03'),
(34, 54613125, 'paulina12', 'CLIENTE', '2023-06-03'),
(35, 54134788, 'freddyk', 'CLIENTE', '2023-06-03'),
(36, 45133697, 'sebasCR', 'CLIENTE', '2023-06-03'),
(37, 15131487, 'javiesp', 'CLIENTE', '2023-06-03'),
(38, 32651513, 'adamsmh', 'CLIENTE', '2023-06-04'),
(39, 54681351, '546841312', 'CLIENTE', '2023-06-04'),
(40, 87464451, 'juanpi99', 'CLIENTE', '2023-06-04'),
(41, 37894123, 'tatirosas', 'CLIENTE', '2023-06-04'),
(42, 45784123, 'edilcruz', 'CLIENTE', '2023-06-04'),
(43, 54878457, '46781513', 'CLIENTE', '2023-06-04'),
(44, 84378643, 'karol999', 'CLIENTE', '2023-06-05'),
(45, 78789435, '781354548', 'CLIENTE', '2023-06-05'),
(46, 12313842, '48654615', 'CLIENTE', '2023-06-05'),
(47, 67184611, 'lorenz98', 'CLIENTE', '2023-06-05'),
(48, 56465484, 'sebas999', 'CLIENTE', '2023-06-05'),
(49, 92612321, 'kelly999', 'CLIENTE', '2023-06-06'),
(50, 78454845, 'bettyst', 'CLIENTE', '2023-06-06'),
(51, 12934299, 'gioc111', 'CLIENTE', '2023-06-06'),
(52, 32134942, 'mario64', 'CLIENTE', '2023-06-06'),
(53, 68784578, 'gianc997', 'CLIENTE', '2023-06-06'),
(54, 67848648, 'bernarcris', 'CLIENTE', '2023-06-06'),
(55, 87984146, 'paolora', 'CLIENTE', '2023-06-06'),
(56, 76894894, '76894894', 'CHOFER', '2023-06-06'),
(57, 84567868, '84567868', 'CHOFER', '2023-06-06'),
(58, 76458484, '76458484', 'CHOFER', '2023-06-06'),
(59, 98213112, '98213112', 'CHOFER', '2023-06-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cant_boletos` int(11) NOT NULL,
  `tipo_pago` varchar(30) NOT NULL,
  `monto_total` float(10,2) NOT NULL,
  `fecha_registro_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_cliente`, `cant_boletos`, `tipo_pago`, `monto_total`, `fecha_registro_venta`) VALUES
(1, 1, 2, 'TARJETA', 30.00, '2023-05-31'),
(4, 1, 2, 'TARJETA', 115.00, '2023-06-01'),
(5, 1, 1, 'TARJETA', 40.00, '2023-06-01'),
(6, 5, 2, 'TARJETA', 75.00, '2023-06-01'),
(7, 1, 2, 'TARJETA', 75.00, '2023-06-01'),
(8, 5, 2, 'TARJETA', 90.00, '2023-06-01'),
(9, 3, 2, 'TARJETA', 30.00, '2023-06-02'),
(10, 8, 1, 'TARJETA', 75.00, '2023-06-02'),
(11, 5, 2, 'IZIPAY', 30.00, '2023-06-02'),
(12, 14, 2, 'TARJETA', 75.00, '2023-06-02'),
(13, 18, 1, 'TARJETA', 75.00, '2023-06-03'),
(14, 16, 2, 'TARJETA', 30.00, '2023-06-03'),
(15, 22, 1, 'TARJETA', 35.00, '2023-06-03'),
(16, 50, 3, 'TARJETA', 115.00, '2023-06-03'),
(17, 48, 2, 'TARJETA', 150.00, '2023-06-03'),
(18, 28, 3, 'TARJETA', 45.00, '2023-06-03'),
(19, 35, 1, 'TARJETA', 75.00, '2023-06-03'),
(20, 42, 2, 'TARJETA', 30.00, '2023-06-03'),
(21, 47, 4, 'TARJETA', 145.00, '2023-06-04'),
(22, 19, 1, 'TARJETA', 40.00, '2023-06-04'),
(23, 23, 4, 'TARJETA', 60.00, '2023-06-04'),
(24, 32, 2, 'TARJETA', 150.00, '2023-06-04'),
(25, 37, 2, 'TARJETA', 30.00, '2023-06-04'),
(26, 43, 2, 'TARJETA', 75.00, '2023-06-04'),
(27, 39, 1, 'TARJETA', 75.00, '2023-06-04'),
(28, 1, 1, 'TARJETA', 35.00, '2023-06-04'),
(29, 4, 2, 'TARJETA', 30.00, '2023-06-05'),
(30, 11, 1, 'TARJETA', 15.00, '2023-06-05'),
(31, 17, 2, 'TARJETA', 30.00, '2023-06-05'),
(32, 21, 1, 'TARJETA', 75.00, '2023-06-05'),
(33, 25, 2, 'TARJETA', 80.00, '2023-06-05'),
(34, 15, 2, 'TARJETA', 150.00, '2023-06-05'),
(35, 20, 2, 'TARJETA', 75.00, '2023-06-05'),
(36, 25, 2, 'TARJETA', 80.00, '2023-06-06'),
(37, 34, 2, 'TARJETA', 30.00, '2023-06-06'),
(38, 38, 1, 'TARJETA', 75.00, '2023-06-06'),
(39, 41, 1, 'TARJETA', 15.00, '2023-06-06'),
(40, 8, 2, 'TARJETA', 150.00, '2023-06-06'),
(41, 16, 2, 'TARJETA', 80.00, '2023-06-06'),
(42, 20, 1, 'TARJETA', 15.00, '2023-06-06'),
(43, 23, 2, 'TARJETA', 30.00, '2023-06-06'),
(44, 15, 1, 'TARJETA', 15.00, '2023-06-06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`id_boleto`),
  ADD KEY `id_ruta` (`id_ruta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `hora_viaje` (`hora_viaje`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_boleto` (`id_boleto`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `hora_viaje`
--
ALTER TABLE `hora_viaje`
  ADD PRIMARY KEY (`id_hora_viaje`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id_ruta`),
  ADD KEY `tipo_viaje` (`tipo_viaje`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`id_transporte`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `dni_usuario` (`dni_usuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boleto`
--
ALTER TABLE `boleto`
  MODIFY `id_boleto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `hora_viaje`
--
ALTER TABLE `hora_viaje`
  MODIFY `id_hora_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `transporte`
--
ALTER TABLE `transporte`
  MODIFY `id_transporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD CONSTRAINT `boleto_ibfk_1` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`),
  ADD CONSTRAINT `boleto_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `boleto_ibfk_4` FOREIGN KEY (`hora_viaje`) REFERENCES `hora_viaje` (`id_hora_viaje`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni_usuario`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`),
  ADD CONSTRAINT `detalle_venta_ibfk_3` FOREIGN KEY (`id_boleto`) REFERENCES `boleto` (`id_boleto`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni_usuario`);

--
-- Filtros para la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD CONSTRAINT `transporte_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
