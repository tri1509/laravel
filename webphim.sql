-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 31, 2023 lúc 01:39 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webphim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `position` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`, `position`) VALUES
(5, 'Phim truyện', 'Phim dài tập', 1, 'phim-truyen', 0),
(6, 'Phim kiếm hiệp', 'Phim kiếm hiệp', 1, 'phim-kiem-hiep', 2),
(8, 'Phim hành động', 'Phim hành động', 1, 'phim-hanh-dong', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Việt Nam', 'Việt Nam', 1, 'viet-nam'),
(2, 'Thái Lan', 'Thái Lan', 1, 'thai-lan'),
(4, 'Ấn độ', 'Ấn độ', 1, 'an-do'),
(7, 'Mỹ', 'Phim Mỹ', 1, 'my'),
(9, 'Thuỵ Sĩ', 'Thuỵ Sĩ', 1, 'thuy-si'),
(10, 'Trung Quốc', 'Trung Quốc', 1, 'trung-quoc'),
(11, 'Hàn Quốc', 'Hàn Quốc', 1, 'han-quoc'),
(12, 'Nhật Bản', 'Nhật Bản', 1, 'nhat-ban');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `link` text NOT NULL,
  `episode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `link`, `episode`) VALUES
(7, 33, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ikRRP1DKl0E?list=PLmYCZ2Ze8-vWZaw0o0E_Z3ErKGJoa76n2\" title=\"Bích Huyết Kiếm - Tập 1 (Thuyết Minh) | Kiếm Hiệp Kim Dung Hay | Cổ Trang Hành Động Võ Thuật\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1'),
(8, 33, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/5Anruehw7pU?list=PLmYCZ2Ze8-vWZaw0o0E_Z3ErKGJoa76n2\" title=\"Bích Huyết Kiếm - Tập 2 (Thuyết Minh) | Kiếm Hiệp Kim Dung Hay | Cổ Trang Hành Động Võ Thuật\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2'),
(9, 33, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/z8lp9KzzMyM?list=PLmYCZ2Ze8-vWZaw0o0E_Z3ErKGJoa76n2\" title=\"Bích Huyết Kiếm - Tập 3 (Thuyết Minh) | Kiếm Hiệp Kim Dung Hay | Cổ Trang Hành Động Võ Thuật\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '3'),
(10, 33, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/BWfJ99trhC0?list=PLmYCZ2Ze8-vWZaw0o0E_Z3ErKGJoa76n2\" title=\"Bích Huyết Kiếm - Tập 4 (Thuyết Minh) | Kiếm Hiệp Kim Dung Hay | Cổ Trang Hành Động Võ Thuật\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '4'),
(15, 30, '<iframe width=\"1509\" height=\"758\" src=\"https://www.youtube.com/embed/Lz8nvVp3MNE\" title=\"BỐ GIÀ - TẬP 1|TRẤN THÀNH, LÊ GIANG, ANH ĐỨC, LÂM VỸ DẠ, TRÚC NHÂN, TUẤN TRẦN, UYỂN ÂN, BÀ TÂN VLOG\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'phim-le'),
(16, 42, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/pg4L29p98Kw\" title=\"Phim \"Nhà Bà Nữ\" Trailer | KC 22.01.2023\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'phim-le'),
(17, 31, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/EmTgEv3uYLg\" title=\"Phim Võ Thuật Đỉnh của Chóp - Review Phim Tuyệt Đỉnh Kungfu Châu Tinh Trì\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'phim-le'),
(18, 35, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/OPdPsV8LEMA\" title=\"Phim LẬT MẶT 1 Lý Hải, Trường Giang - bản FULL\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'phim-le'),
(19, 38, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/DxX0Bhuzjbg\" title=\"REVIEW PHIM ĐỘI TRƯỞNG MỸ 1 || CAPTAIN AMERICA: KẺ BÁO THÙ ĐẦU TIÊN || SAKURA REVIEW\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'phim-le'),
(20, 39, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/BTbw9Ws0M7Y\" title=\"[Phim Chiếu Rạp] Annabelle 3 Ác quỷ Trở Về - Phim Mỹ Kinh Dị 2019\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'phim-le'),
(21, 36, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/TnMrrg9ssXA\" title=\"HẺM CỤT FULL- TRẤN THÀNH | NS NGỌC GIÀU, NS VIỆT ANH, LÊ GIANG, DƯƠNG LÂM, QUỐC KHÁNH, LỘ LỘ, A QUAY\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'phim-le'),
(22, 29, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/50q4FGw1GcA?list=PLirxsEkduv0Oda1XfmaYzGxkinYKZhUL6\" title=\"Thiên Long Bát Bộ 01/45 (tiếng Việt) | Huỳnh Nhật Hoa, Trần Hạo Dân, Phàn Thiếu Hoàng | TVB 1997\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '1'),
(23, 29, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/N55nHrFe49k?list=PLirxsEkduv0Oda1XfmaYzGxkinYKZhUL6\" title=\"Thiên Long Bát Bộ 02/45 (tiếng Việt) | Huỳnh Nhật Hoa, Trần Hạo Dân, Phàn Thiếu Hoàng | TVB 1997\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2'),
(24, 29, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/WyqOy-eJVsU?list=PLirxsEkduv0Oda1XfmaYzGxkinYKZhUL6\" title=\"Thiên Long Bát Bộ 03/45 (tiếng Việt) | Huỳnh Nhật Hoa, Trần Hạo Dân, Phàn Thiếu Hoàng | TVB 1997\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '3'),
(25, 29, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/FLmD749JamU?list=PLirxsEkduv0Oda1XfmaYzGxkinYKZhUL6\" title=\"Thiên Long Bát Bộ 04/45 (tiếng Việt) | Huỳnh Nhật Hoa, Trần Hạo Dân, Phàn Thiếu Hoàng | TVB 1997\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '4'),
(26, 29, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/QXAhWvpuJgM?list=PLirxsEkduv0Oda1XfmaYzGxkinYKZhUL6\" title=\"Thiên Long Bát Bộ 05/45 (tiếng Việt) | Huỳnh Nhật Hoa, Trần Hạo Dân, Phàn Thiếu Hoàng | TVB 1997\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '5'),
(27, 29, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/6fMIS9Mcr1w?list=PLirxsEkduv0Oda1XfmaYzGxkinYKZhUL6\" title=\"Thiên Long Bát Bộ 06/45 (tiếng Việt) | Huỳnh Nhật Hoa, Trần Hạo Dân, Phàn Thiếu Hoàng | TVB 1997\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '6'),
(28, 26, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/LZnTBxydikw?list=PLVY6WCT1_gMVib5J38erOZfHCcJ4JLWF_\" title=\"Anh Hùng Xạ Điêu cắt tập 1 - Dương Thiết Tâm và Quách Khiếu Thiên bị vu oan bỏ mạng ở sa trường\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '1'),
(29, 26, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/cqnbu2X5j44?list=PLVY6WCT1_gMVib5J38erOZfHCcJ4JLWF_\" title=\"Anh Hùng Xạ Điêu cắt tập 2 - Khâu Xứ Cơ so tài cùng Giang Nam Thất Quái\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2'),
(30, 27, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/LNZET4lTJWo\" title=\"Thần Điêu Đại Hiệp 1995 Tập 17\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '17'),
(31, 34, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/3cJGVJOtkc8\" title=\"Lộc Đỉnh Ký cắt tập 22 - 3 - Vi Tiểu Bảo là cục nam châm sao? Phụ nữ nào gặp cũng bị hút hồn?\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '22'),
(32, 25, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/bakkSccKHIw\" title=\"TIẾU NGẠO GIANG HỒ 2013 - TẬP 1 [Lồng Tiếng] Kiếm Hiệp Kim Dung | Lệnh Hồ Xung, Đông Phương Bất Bại\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '1'),
(33, 25, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/okmt9Vu6rek?list=PLpcpj9UYE4qfdNiXQkXsRh16hyPL15p4w\" title=\"Tiếu Ngạo Giang Hồ phần 02 [Truyện audio] | VOV giao thông\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2'),
(34, 37, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/hGhdUz8A4OI?list=PLHKZSw-oD0EReNLVCa01l945x3gE1d1h_\" title=\"TẬP 1 | TÂY DU KÝ (Phim truyền hình 1986) - Journey to the West (1986 TV series)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '1'),
(35, 37, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/v6skZ0v2fgU?list=PLHKZSw-oD0EReNLVCa01l945x3gE1d1h_\" title=\"TẬP 2 | TÂY DU KÝ (Phim truyền hình 1986) - Journey to the West (1986 TV series)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2'),
(36, 37, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/OlFMQPh8dOY?list=PLHKZSw-oD0EReNLVCa01l945x3gE1d1h_\" title=\"TẬP 3 | TÂY DU KÝ (Phim truyền hình 1986) - Journey to the West (1986 TV series)\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '3'),
(37, 22, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/tz74qMSriEM?list=PLxZ4J8cazpIBICpz_gZFROjUW6ASUUyAD\" title=\"Lần Đầu Yêu Anh Tập 01 | Điền Hi Vi, Vương Tinh Việt | Phim Ngôn Tình Siêu Ngọt Ngào | iQIYI Vietnam\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '1'),
(38, 22, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/ikoOrMdcteY?list=PLxZ4J8cazpIBICpz_gZFROjUW6ASUUyAD\" title=\"Lần Đầu Yêu Anh Tập 02 | Điền Hi Vi, Vương Tinh Việt | Phim Ngôn Tình Siêu Ngọt Ngào | iQIYI Vietnam\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2'),
(39, 20, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/MkcTAai3oAE?list=PLxZ4J8cazpIBYW0GmU_X87dMqP-vIrgyz\" title=\"【Lồng Tiếng】Phim Ngôn Tình - Lâm Nhất x Từ Lộ | Thời Gian Lương Thần Mỹ Cảnh Tập 01 | iQiyi Vietnam\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '1'),
(40, 20, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/p5x3idViTAY?list=PLxZ4J8cazpIBYW0GmU_X87dMqP-vIrgyz\" title=\"【Lồng Tiếng】Phim Ngôn Tình - Lâm Nhất x Từ Lộ | Thời Gian Lương Thần Mỹ Cảnh Tập 31 | iQiyi Vietnam\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '31'),
(41, 32, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/kXrkBA4ONpQ\" title=\"Trích Đoạn Sứ Giả Thưởng Thiện Phạt Ác Bị Trúng Độc - Được Em Zai Mới Kết Nghĩa Cứu Mạng\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '13'),
(42, 28, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/fk4DRpqMwtE?list=PLNKn8ueKfBA8v_XwhS2XT6LswYak3CTMd\" title=\"Ỷ Thiên Đồ Long Ký - Tập 01 | Tô Hữu Bằng | Phim Kiếm Hiệp Kim Dung Hay Nhất | Full HD | PhimTV\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '1'),
(43, 28, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/7VnQNJ_WkoI?list=PLNKn8ueKfBA8v_XwhS2XT6LswYak3CTMd\" title=\"Ỷ Thiên Đồ Long Ký - Tập 02 | Tô Hữu Bằng | Phim Kiếm Hiệp Kim Dung Hay Nhất | Full HD | PhimTV\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '2'),
(44, 28, '<iframe width=\"1509\" height=\"757\" src=\"https://www.youtube.com/embed/XphVOUiNKDo?list=PLNKn8ueKfBA8v_XwhS2XT6LswYak3CTMd\" title=\"Ỷ Thiên Đồ Long Ký - Tập Cuối | Tô Hữu Bằng | Phim Kiếm Hiệp Kim Dung Hay Nhất | Full HD | PhimTV\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`) VALUES
(2, 'tâm lý', 'tâm lý', 1, 'tam-ly'),
(3, 'kịch tính', 'hành động', 1, 'kich-tinh'),
(4, 'tình cảm', 'tình cảm', 1, 'tinh-cam'),
(6, 'hài hước', 'hài hước', 1, 'hai-huoc'),
(7, 'kinh dị', 'kinh dị', 1, 'kinh-di'),
(8, 'võ thuật', 'võ thuật', 1, 'vo-thuat'),
(9, 'viễn tưởng', 'viễn tưởng', 1, 'vien-tuong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(40) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(40) NOT NULL,
  `thuocphim` varchar(20) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(40) NOT NULL,
  `genre_id` int(40) NOT NULL,
  `country_id` int(40) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `position` int(20) DEFAULT NULL,
  `phim_hot` int(20) NOT NULL,
  `resolution` int(11) NOT NULL DEFAULT 0,
  `name_eng` varchar(255) NOT NULL,
  `phude` int(11) NOT NULL DEFAULT 0,
  `ngaytao` varchar(50) DEFAULT NULL,
  `ngaycapnhat` varchar(50) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL,
  `thoiluong` int(5) NOT NULL DEFAULT 180,
  `tags` text DEFAULT NULL,
  `actor` text DEFAULT NULL,
  `topview` int(11) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  `sotap` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `status`, `thuocphim`, `image`, `category_id`, `genre_id`, `country_id`, `slug`, `position`, `phim_hot`, `resolution`, `name_eng`, `phude`, `ngaytao`, `ngaycapnhat`, `year`, `thoiluong`, `tags`, `actor`, `topview`, `trailer`, `sotap`) VALUES
(20, 'Thời Gian Lương Thần Mỹ Cảnh', 'Một ca sĩ toả sáng chói ngời được yêu mến trên sân khấu nhưng khi đi vào thế giới game lại chỉ có trình độ ngang học sinh tiểu học. Anh chàng học bá đẹp trai thông minh hơn người lại không biết người bên kia màn hình là thần tượng trong lòng mình? Một mối tình trên mạng âm thầm nảy nở, tình cảm hai bên đan xen giữa không gian và thời gian. Cùng chờ xem phản ứng hoá học trong mối tình của cô ca sĩ thực lực và hotboy trường học sẽ ra sao đây nhỉ?', 1, 'phim bộ', 'a_100438519_m_601_vi_m1_260_360222.webp', 5, 4, 11, 'thoi-gian-luong-than-my-canh', 9, 1, 2, 'The Time of Divine Mercy', 1, '2023-01-31 15:39:51', '2023-01-31 15:39:51', '2020', 180, 'Từ Lộ, Lâm Nhất, Hồ Binh', 'Từ Lộ, Lâm Nhất, Hồ Binh', 2, NULL, 31),
(22, 'Lần Đầu Yêu Anh', 'Miêu tả: \"Lần Đầu Yêu Anh\" là một bộ phim về tình yêu tuổi trẻ của đạo diễn Thẩm Thấm Nguyên với sự tham gia của Điền Hi Vi và Vương Tinh Việt. Bộ phim kể về Lư Vãn Vãn - cô sinh viên năm hai khoa Lâm sàng của trường Đại học Y Thanh Diệu, vậy mà tâm lý kém khiến cô có biểu hiện bất thường mỗi khi thi cử, điều này không phù hợp với ngôi trường y khoa nghiêm ngặt. Sau nhiều năm yêu thầm không thành, Lư Vãn Vãn say rượu tuyên bố sẽ theo đuổi siêu cấp học bá cùng trường Nhâm Sơ. Sau tuyên bố này khiến scandal tình ái giữa hai người ngày càng lan rộng, ảnh hưởng nghiêm trọng đến việc học tập và cuộc sống vốn đã rất vất vả của Lư Vãn Vãn. Để làm rõ mối quan hệ giữa hai người, cô đã cùng với Nhâm Sơ tạo ra \"Kế hoạch loại bỏ Scandal\". Trong quá trình làm rõ scandal, cả hai đã nhìn thấy điểm sáng trong tính cách của nhau và dần nảy sinh tình cảm với nhau. Với sự giúp đỡ và hướng dẫn của Nhâm Sơ, Lư Vãn Vãn đã dần vượt qua chính mình, tìm được sự cân bằng giữa sở thích và việc học của mình, đồng thời chăm chỉ học tập để trở thành một sinh viên y khoa đạt chuẩn. Nhâm Sơ cũng bị Vãn Vãn ảnh hưởng , bỏ đi vẻ mặt kiểu ngạo lạnh lũng càng ngày càng trở lên dễ gần và thân thiện hơn. Cả hai đã vô tình thay đổi lẫn nhau và trở thành một phiên bản tốt hơn của chính họ, cuối cùng họ đã có được một mối tình lãng mạn. Bộ phim sẽ được phát sóng trực tuyến trên iQiyi Quốc tế (iq.com).', 1, 'phim bộ', 'a_100499877_m_601_vi_m2_260_3601961.webp', 5, 9, 11, 'lan-dau-yeu-anh', 8, 0, 0, 'Love You For The First Time', 1, '2023-01-31 15:37:34', '2023-01-31 15:37:34', '2020', 30, 'iQIYI, LầnĐầuYêuAnh, ĐiềnHiVi, VươngTinhViệt', 'Điền Hi Vi, Vương Tinh Việt', 1, NULL, 52),
(25, 'tiếu ngạo giang hồ', 'Tiếu ngạo giang hồ (tiếng Trung: 笑傲江湖; bính âm: xiào ào jiāng hú, tiếng Anh: The Smiling, Proud Wanderer, hoặc State of Divinity) là một tiểu thuyết kiếm hiệp của Kim Dung, lần đầu tiên được phát hành trên Minh báo từ ngày 20 tháng 4 năm 1967 đến 12 tháng 10 năm 1969.[1][2] Tiêu đề \"Tiếu ngạo giang hồ\" được đặt theo một bản nhạc cầm tiêu hợp tấu đóng vai trò trung tâm của tác phẩm. Tiếu ngạo giang hồ được coi là một trong những tiểu thuyết đặc sắc nhất của tác giả.', 1, 'phim bộ', '139txz4z_660x946-tieungaogiangho20132931.jpg', 6, 8, 10, 'tieu-ngao-giang-ho', 9, 1, 4, 'Swordsman', 0, '2023-01-31 15:33:52', '2023-01-31 15:33:52', '2014', 180, 'Nội dung truyện xoay quanh những đề tài về tình bạn, tình yêu, sự dối trá, phản bội, những âm mưu và cả ham muốn quyền lực. Trung tâm của toàn bộ cốt truyện là nhân vật chính Lệnh Hồ Xung, một đệ tử của chưởng môn phái Hoa Sơn Nhạc Bất Quần. Xuyên suốt câu chuyện, người đọc được dẫn dắt theo hành trình trở thành một kiếm khách lẫy lừng của chàng lãng tử này, đồng thời trải nghiệm những chứng kiến của Lệnh Hồ Xung đối với nhiều âm mưu tranh quyền đoạt vị trên giang hồ.', 'Hoắc Kiến Hoa, Viên San San, Trần Kiều Ân', 0, 'bakkSccKHIw', 42),
(26, 'Anh hùng xạ điêu', 'Truyện xảy ra vào thời nhà Tống (960-1279) khi người người Nữ Chân bắt đầu tấn công bắc Trung Quốc. Phần đầu của tiểu thuyết xoay quanh tình bạn giữa Dương Thiết Tâm và Quách Khiếu Thiên, hai vị hiệp sĩ đã anh dũng chiến đấu chống lại sự tàn bạo của quân Kim. Mối quan hệ của hai gia đình khăng khít đến nỗi họ thề ước là khi con họ lớn lên, chúng sẽ kết nghĩa huynh đệ, kết thành tỷ muội hoặc kết thành phu thê.\r\n\r\nPhần hai của câu chuyện tập trung vào những gian nan đau khổ mà cả hai phải trải qua. Quách Tĩnh, con của Quách Khiếu Thiên lớn lên ở Mông Cổ, dưới sự bảo vệ của Thành Cát Tư Hãn. Dương Khang mặt khác lớn lên là hoàng thân của nhà Kim.\r\nNguyện ước của hai họ Dương - Quách === Dương Thiết Tâm đang sống êm đềm với vợ hiền là Bao Tích Nhược và Quách Khiếu Thiên với Lý Bình, thì một hôm, họ tình cờ gặp được đạo sĩ Toàn Chân phái là Khưu Xứ Cơ. Khưu vừa giết và xách thủ cấp tên gian thần Vương Đạo Càn nên bị quan quân triều đình truy đuổi ráo riết. Khưu Xứ Cơ tại nhà của Quách Dương hai người ở thôn Ngưu Gia phủ Lâm An đã một mình đánh tan truy binh, khiến Quách Khiếu Thiên và Dương Thiết Tâm vô cùng khâm phục. Khưu Xứ Cơ đã đề nghị đặt tên cho hai đứa con của họ khi ấy còn trong bụng mẹ, con của Quách Khiếu Thiên đặt tên là Quách Tĩnh, con của Dương Thiết Tâm đặt tên là Dương Khang. Tĩnh Khang là niên hiệu của vua Tống Khâm Tông, cùng với vua Tống Huy Tông đã bị lính Kim bắt đi, kết thúc triều đại Bắc Tống. Khưu Xứ Cơ muốn những đứa trẻ nhớ nỗi nhục quốc này và mong chúng sẽ khôi phục vinh quang và đánh bại giặc Kim khi lớn lên. Những cái tên đó tượng trưng cho lòng yêu nước của Tĩnh và Khang. Hai anh em nguyện ước với nhau, khi con của hai người lớn lên, nếu đều là con trai thì cho kết làm huynh đệ, nếu đều là con gái thì cho kết làm tỉ muội, nếu là một trai một gái thì cho kết làm vợ chồng.', 1, '', 'Anh_hùng_xạ_điêu_1994_poster1424.jpg', 6, 8, 10, 'anh-hung-xa-dieu', 9, 1, 4, 'Condor Heroes', 1, '2023-01-30 16:31:53', '2023-01-30 16:31:53', '1995', 180, 'Condor Heroes, Anh hùng xạ điêu, quách tĩnh, hoàng dung, âu dương phong, xạ điêu tam bộ khúc', 'Trương Trí Lâm, Chu Ân', 0, NULL, 35),
(27, 'Thần điêu đại hiệp', 'Thần điêu hiệp lữ (giản thể: 神雕侠侣; phồn thể: 神鵰俠侶; bính âm: shén diāo xiá lǔ) hay Thần điêu đại hiệp[1] là một tiểu thuyết võ hiệp của Kim Dung. Tác phẩm được đăng tải lần đầu tiên trên tờ Minh báo vào ngày 20 tháng 5 năm 1959 và được đăng liên tục trong ba năm[2].\r\n\r\nThần điêu hiệp lữ là phần hai trong bộ Xạ điêu tam bộ khúc. Bối cảnh của Thần điêu hiệp lữ là vào cuối thời Nam Tống, khi quân Mông Cổ đã lớn mạnh, tiêu diệt hầu hết châu Á, châu Âu, đang trực tiếp uy hiếp an nguy của Nam Tống.\r\n\r\nCâu chuyện xoay quanh tình yêu của hai nhân vật chính là Dương Quá và Tiểu Long Nữ giữa những cuộc chiến tang thương đẫm máu cả trên giang hồ lẫn chiến trường.\r\n\r\nCũng giống như những tác phẩm khác của Kim Dung, Thần điêu hiệp lữ đã được tác giả chỉnh sửa nhiều lần. Nội dung của bản lưu hành hiện tại có rất nhiều điểm khác biệt so với lần phát hành đầu tiên.', 1, '', 'ThanDieuDaiHiep1995-ROCH95CoverBright8363.jpg', 6, 8, 10, 'than-dieu-dai-hiep', 4, 1, 4, 'God Condor', 1, '2023-01-30 17:00:13', '2023-01-30 17:00:13', '1996', 159, 'God Condor, thần điêu đại hiệp, dương quá, tiểu long nữ, xạ điêu tam bộ khúc, kim dung', 'Cổ Thiên Lạc, Lý Nhược Đồng', 1, 'URwbz_QkyrY', 32),
(28, 'Ỷ thiên Đồ long ký', 'Ỷ Thiên Đồ Long ký (tiếng Trung: 倚天屠龍記), còn được dịch ra tiếng Việt là Cô gái Đồ Long, là một tiểu thuyết võ hiệp của nhà văn Kim Dung. Đây là cuốn cuối cùng trong bộ tiểu thuyết Xạ điêu tam khúc. Tiểu thuyết được Hương Cảng Thương báo xuất bản lần đầu năm 1961 tại Hồng Kông và sau đó bản tiếng Việt được Nhà xuất bản Văn học xuất bản tại Việt Nam.​​​\r\n\r\nBối cảnh tiểu thuyết lấy vào cuối thời nhà Nguyên, 80 năm sau sự kiện trên đỉnh Hoa Sơn trong Thần điêu hiệp lữ, lúc này nhà Nguyên đang bị suy yếu bởi các cuộc khởi nghĩa và vì sự xa hoa lãng phí của triều đình. Truyện xoay quanh Trương Vô Kỵ và mối tình phức tạp với 4 cô gái, bên cạnh đó là những âm mưu thủ đoạn đầy máu tanh trên giang hồ nhằm chiếm đoạt hai món báu vật là Đồ Long đao và Ỷ Thiên kiếm, với lời đồn nếu tìm được bí mật trong đao kiếm sẽ hiệu triệu được thiên hạ. Truyện kết thúc với sự sụp đổ của nhà Nguyên, người Mông Cổ phải rút về thảo nguyên phía bắc cùng với sự thành lập của nhà Minh bởi Minh Thái Tổ Chu Nguyên Chương.\r\n\r\nTrương Vô Kỵ là nhân vật chính trong truyện, được xem là có nội tâm phức tạp hơn so với Quách Tĩnh và Dương Quá, điều này làm cho nhân vật trở nên thực tế hơn. Trương Vô Kỵ vào cuối truyện xem Triệu Mẫn là tình yêu lớn nhất của đời mình, nhưng anh vẫn nhớ nhung 3 cô gái khác. Mặc dù có võ công cao cường và là một người chính trực khẳng khái, có thể truyền cảm hứng cho người khác, song Trương Vô Kỵ không hề có những tố chất cần thiết của một nhà lãnh đạo là lòng ham muốn mãnh liệt với quyền lực và tâm kế để duy trì quyền lực. Chính vì vậy vào cuối truyện, anh đã bị Chu Nguyên Chương lừa nên từ chức và bỏ đi cùng Triệu Mẫn, khiến quyền lực của quân khởi nghĩa chống Nguyên dần rơi vào tay Chu Nguyên Chương, làm bước đệm cho Chu Nguyên Chương giành lấy thiên hạ.', 1, '', 'tải xuống9471.jpg', 6, 8, 10, 'y-thien-do-long-ky', 9, 1, 2, 'Dragon Sign', 1, '2023-01-06 23:28:20', '2023-01-06 23:28:20', '2003', 45, 'Trương Vô Kỵ, Triệu Mẫn, Kim Dung, Chu Chỉ Nhược, Ân Nhi, Hoàng Sam Nữ Tử, Tiểu Chiêu, Tử Sam Long Vương, Kim Mao Sư Vương', 'Tô Hữu Bằng, Cao Viên Viên, Giả Tịnh Văn', 2, 'fxVFpppwi9U', 40),
(29, 'thiên long bát bộ', 'Thiên long bát bộ (giản thể: 天龙八部; phồn thể: 天龍八部; bính âm: Tiān Lóng Bā Bù) là một tiểu thuyết võ hiệp của nhà văn Kim Dung. Tác phẩm được bắt đầu được đăng trên tờ Minh báo ở Hồng Kông và Nam Dương thương báo ở Singapore vào ngày 3 tháng 9 năm 1963 đến ngày 27 tháng 5 năm 1966, liên tục trong 4 năm.[1] Nội dung \"Thiên long bát bộ\" thấm đượm tinh thần Phật giáo mà Kim Dung vốn ngưỡng mộ, tiếng nói của Phật giáo trong tác phẩm vừa dịu dàng sâu lắng vừa thật hiển minh, quán xuyến từ đầu chí cuối tác phẩm.[1] Các nhân vật chính trong tiểu thuyết được dựa trên Bát bộ chúng, là tám loài hữu tình trong thần thoại Phật giáo bao gồm: Thiên, Long, Dạ Xoa, Càn Thát Bà, A Tu La, Ca Lâu La, Khẩn Na La và Ma Hầu La Già.\r\n\r\nCuối năm 2004, nhà xuất bản giáo dục nhân dân của Cộng hòa Nhân dân Trung Hoa đã đưa tác phẩm Thiên long bát bộ vào sách giáo khoa lớp 12. Bộ Giáo dục Singapore cũng làm như vậy đối với các trường cấp 2, 3 sử dụng tiếng Trung Quốc. Thiên long bát bộ cũng đã được chuyển thể thành phim truyền hình nhiều lần bởi cả các nhà sản xuất Trung Hoa đại lục và Hồng Kông.', 1, '', 'Aaa1og8474.jpg', 6, 8, 10, 'thien-long-bat-bo', 9, 1, 1, 'Condor Heroes', 0, '2023-01-06 23:33:21', '2023-01-06 23:33:21', '1997', 180, 'thiên long bát bộ, mộ dung phục, đoàn dự, hư trúc, tiêu phong, xạ điêu tam bộ khúc', 'Huỳnh Nhật Hoa, Trần Hạo Dân, Phàn Thiếu, Lý Nhược Đồng , Hà Mỹ Điền', 1, 'S1grp52rLK0', 45),
(30, 'Bố già', 'Bố già là một bộ phim điện ảnh hài chính kịch của Việt Nam năm 2021 do Trấn Thành và Vũ Ngọc Đãng đồng đạo diễn. Bộ phim do Thảo Nguyễn đảm nhiệm vai trò sản xuất, dựa trên phần kịch bản do Trấn Thành, Kalei An Nhi và Aquay chấp bút. Phim được Trấn Thành Town cùng HKFilm chịu trách nhiệm sản xuất và Galaxy Studio giữ vai trò phân phối, dựa trên bộ web drama cùng tên năm 2020. với sự tham gia diễn xuất của Trấn Thành, Tuấn Trần, Ngân Chi, NSND Ngọc Giàu, Lê Giang, Hoàng Mèo, Lan Phương, La Thành, Lê Trang, Quốc Khánh, A Quay và Bảo Phúc. Lấy bối cảnh tại Thành phố Hồ Chí Minh, nội dung phim xoay quanh mỗi quan hệ giữa ông Sang – một người luôn lo chuyện bao đồng và giúp đỡ người khác – và con trai ông là Quắn – một cậu thanh niên kiếm tiền bằng Youtube rất yêu thương ba và em gái – cùng những rắc rối mà cả hai gặp phải với những người thân trong gia đình mình.', 1, 'phim lẻ', 'images5898.jpg', 5, 6, 1, 'bo-gia', 8, 1, 2, 'Father Old', 1, '2023-01-30 17:41:48', '2023-01-30 17:41:48', '2020', 60, 'Ba Sang, Quần, Hai Giàu, Bù Tọt', 'Trấn Thành, Lê Dương Bảo Lâm, Lê Giang, Uyển Ân, Tuấn Trần, Quốc Khánh', 0, NULL, 1),
(31, 'Tuyệt đỉnh Kungfu', 'Trong phim Tuyệt Đỉnh Kungfu, trong xã hội hỗn loạn ở Trung Quốc những năm 1940, các băng nhóm thực sự có ảnh hưởng. Trong phim hay này, đáng sợ nhất phải kể đến đảng Lưỡi Búa mà kẻ đứng đầu là Sum. Băng nhóm của Sum đi đến đâu nỗi kinh hoàng theo tới đó. Người dân thành phố thì lo lắng, đám cảnh sát thì sợ sệt. Chỉ duy có khu ổ chuột Chuồng Heo là không bị đám côn đồ nhũng nhiễu vì người dân nơi đây quá nghèo. Một ngày nọ, đột nhiên có hai tên lang thang giả dạng lưu manh Sing và Bone xuất hiện và định moi tiền của một anh thợ cắt tóc. Xung đột xảy ra trong phim này và bọn chúng được phen bất ngờ khi toàn bộ dân khu này ai cũng rất giỏi võ. Đảng Lưỡi Búa lại kéo tới chi viện, chúng bị các cao thủ đánh cho một trận thừa sống thiếu chết. Mâu thuẫn trở nên sâu sắc, Sum phái Sing đi mời đại cao thủ Quái Vật bất bại về làm cỏ khu Chuồng Heo. Tuy nhiên trong phim online này lại xuất hiện một người anh hùng có khả năng chặn đứng Quái Vật, anh là ai? Để biết được, kính mời các bạn cùng xem phim Tuyệt Đỉnh Kungfu.', 1, 'phim lẻ', '220px-Tuyet_dinh_cong_phu5192.jpg', 8, 9, 10, 'tuyet-dinh-kungfu', 9, 1, 4, '功夫', 1, '2023-01-30 17:11:44', '2023-01-30 17:11:44', NULL, 108, 'Trong phim Tuyệt Đỉnh Kungfu, Trung Quốc, những năm 1940, các băng nhóm thực sự có ảnh hưởng, đi mời đại cao thủ Quái Vật bất bại về làm cỏ khu Chuồng Heo, xuất hiện một người anh hùng, có khả năng chặn đứng Quái Vật, Tuyệt Đỉnh Kungfu.', 'Châu Tinh Trì, Nguyên Hoa, Nguyên Thu, Trần Quốc Khôn, Lương Tiểu Long', 1, 'EmTgEv3uYLg', 1),
(32, 'Hiệp khách hành', 'Có một chú bé sống cùng mẹ trên núi. Dù mẹ chú tâm địa tàn nhẫn, luôn hắt hủi chú, gọi chú là Cẩu Tạp Chủng (Chó lộn giống) nhưng kỳ lạ thay, chú lớn lên với một tâm hồn cực kỳ trong sáng, tốt bụng, hào hiệp. Hai mẹ con nương tựa nhau sống trên núi với một con chó làm bạn là A Hoàng. Một ngày nọ, bà mẹ bỏ đi, chú xuống núi tìm mẹ và vô tình bị cuốn vào vòng xoáy giang hồ.\r\n\r\nMa Thiên cư sĩ Tạ Yên Khách, một kỳ nhân dị sĩ giang hồ võ công cao cường từng tặng bạn ba miếng sắt nhỏ gọi là Huyền thiết lệnh và cất lời thề rằng bất kỳ ai đem Huyền thiết lệnh đến thì sai việc gì cũng không từ. Sau khi bằng hữu của họ Tạ mất lại không có con cái, ông cất công thu hồi được hai tấm, còn một tấm vô tình đã khiến võ lâm chém giết nhau để tranh đoạt hòng sai khiến Tạ Yên Khách.\r\n\r\nMột cách ngẫu nhiên, Cẩu Tạp Chủng nhặt được nó giữa một đoàn võ lâm khi Tạ Yên Khách đến. Cẩu Tạp Chủng không cầu xin gì khiến Tạ Yên Khách mang chú đi cùng (vì y sợ rằng ai đó sẽ lợi dụng chú để hại mình), ông ta mang Cẩu Tạp Chủng lên Ma Thiên Nhai sống, đem các môn nội công Âm - Dương đối nghịch ra để dạy cho Cẩu Tạp Chủng hòng cho cậu bị xung đột âm dương mà chết.\r\n\r\nCơ duyên đến với cậu, vô tình luyện cả đường lối âm nhu và dương cương đến mức đỉnh điểm, bị tẩu hỏa nhập ma thì Bang Trường Lạc đến cướp cậu về và vô tình một người tấn công cậu đã đả thông kinh mạch của Cẩu Tạp Chủng, giúp cậu có được nội công hùng hậu đến từ cả hai luồng chân khí âm dương. Và Cẩu Tạp Chủng bị \"gán\" cái tên là Thạch Phá Thiên, \"bị\" trở thành bang chủ của bang Trường Lạc.\r\n\r\nThực chất lúc đó, bang Trường Lạc không có bang chủ. Bối Hải Thạch (một người luyện môn Ngũ hành lục hợp chưởng, thường được gọi là Bối đại phu) thao túng cả bang trước đó đã dựng một người tên là Thạch Trung Ngọc lên làm bang chủ nhằm thay mình đi gánh \"đại nạn đảo Hiệp khách\". Thạch Trung Ngọc chính là con trai của vợ chồng Thạch Thanh-Mẫn Nhu đang học võ ở phái Tuyết Sơn, là một gã dâm ô, gây đại họa và trốn đi. Khi làm bang chủ Trường Lạc, y gây nhiều tội lỗi: giết người bừa bãi, hãm hiếp phụ nữ...\r\n\r\nNhưng khi hiểu mình sắp thành vật tế thần cho Bối Hải Thạch, y đã bỏ trốn. Khi thấy Cẩu Tạp Chủng giống hệt như Thạch Trung Ngọc, Bối Hải Thạch đã lập âm mưu đánh cướp cậu về. Lợi dụng lúc Cẩu Tạp Chủng còn mê man, y đã tạo trên người Cẩu Tạp Chủng các dấu vết để giống hệt Thạch Trung Ngọc. Và khi cậu tỉnh lại, cả bang chúng đã cố gán cho cậu chức Bang chủ, và trở thành Thạch Phá Thiên, vốn là tên giả của Thạch Trung Ngọc khi làm bang chủ Trường Lạc bang.', 1, 'phim bộ', '200px-Hiep_khach_hanh6662.jpg', 6, 8, 10, 'hiep-khach-hanh', 9, 1, 4, 'passenger union', 1, '2023-01-31 15:46:53', '2023-01-31 15:46:53', '2000', 45, 'Kim Dung, Cẩu Tạp Chủng, Thạch Phá Thiên,  A Tú, Thạch Trung Ngọc, Tạ Yên Khách', 'Ngô Kiện,Cơ Kỳ Lân,Hàn Nguyệt Kiều,Chương Diễm Mẫn,Ba Đồ', 2, 'kXrkBA4ONpQ', 33),
(33, 'Bích huyết kiếm', 'Vào cuối thời nhà Minh (1368-1644), tướng lĩnh Viên Sùng Hoán bị kẻ xấu cáo buộc oan tư thông với ngoại viên và bị hoàng đế Sùng Trinh xử tử. Con trai Viên Sùng Hoán là Viên Thừa Chí được bảo vệ tính mạng thoát khỏi sự truy lùng gắt gao của An Kiếm Thanh và Tào Công Công khi còn nhỏ được đưa đến núi Hoa Sơn và được Mục Nhân Thanh truyền thụ võ nghệ. Trên núi Hoa Sơn, Viên Thừa Chí tình cờ phát hiện ra Kim xà kiếm và Kim xà bí kíp - di vật của Kim Xà Lang Quân Hạ Tuyết Nghi sau khi mất để lại và học được kiếm thuật thật sự của Hạ Tuyết Nghi.\r\n\r\nSau đó Viên Thừa Chí gặp được Hạ Thanh Thanh, con gái ruột của Hạ Tuyết Nghi và Ôn Nghi. Hạ Thanh Thanh đã đi theo Viên Thừa Chí sau đó bị đuổi khỏi nhà họ Ôn, hai người yêu nhau. Để trả thù cho cha mình, Viên Thừa Chí gia nhập lực lượng khởi nghĩa do Sấm vương Lý Tự Thành lãnh đạo nhằm lật đổ triều đình nhà Minh. Viên Thừa Chí giúp nghĩa quân lấy lại số vàng đã bị gia đình họ Ôn lấy, cùng với Thanh Thanh khám phá ra kho báu ở Nam Kinh mà Kim xà lang quân lúc còn sống chưa kiếm ra được và dùng để cung cấp tài chính cho nghĩa quân. Nhiều nghĩa sĩ giang hồ đã kết bạn và nguyện trung thành với Viên Thừa Chí khi biết chàng là con trai ruột của Viên Sùng Hoán. Họ suy tôn Viên Thừa Chí thành minh chủ của 7 tỉnh, tổ chức thành nghĩa quân nhằm bảo vệ đất nước trước sự xâm lược của quân Mãn Châu phía bắc.\r\n\r\nĐể giúp Sấm vương, Viên Thừa Chí cùng bằng hữu giang hồ tiến hành phá hủy đại pháo do người Tây dương cung cấp cho triều đình đàn áp nhân dân, sau đó chàng lẻn sang kinh đô Mãn Châu nhằm mưu sát Hoàng Thái Cực nhưng không thành công. Mặc dù căm thù hoàng đế Sùng Trinh sát hại cha mình, nhưng Viên Thừa Chí vẫn cứu thoát Sùng Trinh khỏi mưu đồ phế lập của Huệ Vương. Trong thời gian đó chàng quen biết Hà Thiết Thủ, giáo chủ Ngũ độc giáo và là người cùng phe với Huệ Vương, giúp cô cải tà quy chính và thu nhận làm đệ tử. A Cửu (tức Trường Bình công chúa, con gái vua Sùng Trinh) yêu Viên Thừa Chí và chàng cũng phân vân không dứt khoát giữa A Cửu và Thanh Thanh.[2]\r\n\r\nLý Tự Thành sau khi đánh chiếm Bắc Kinh, bức tử vua Sùng Trinh đã không thực hiện lời hứa về việc đưa dân nghèo thoát khỏi cảnh nghèo khổ lầm than, ngược lại còn dung túng cho quân sĩ cướp bóc hãm hiếp lê dân, còn bản thân Lý Tự Thành thì đắm chìm vào rượu ngon gái đẹp, nghe lời sàm nịnh giết chết Lý Nham là người trung thành với mình. Viên Thừa Chí quá thất vọng nên quyết định ra đi. Quân Mãn Châu với sự trợ giúp của Ngô Tam Quế vượt qua Sơn Hải quan tiến vào Trung nguyên, đánh bại Lý Tự Thành và lập ra nhà Thanh. Viên Thừa Chí biết rằng Trung Quốc đã hoàn toàn rơi vào tay người Mãn, chàng nhận ra rằng mình không thể đảo ngược được tình hình nên quyết định cùng Thanh Thanh và bằng hữu giang hồ chu du hải ngoại, định cư tại hải đảo mà ngày nay là Brunei.', 1, '', 'tải xuống (1)5146.jpg', 6, 8, 10, 'bich-huyet-kiem', 5, 0, 2, 'Blue Blood Sword', 0, '2023-01-30 17:07:35', '2023-01-30 17:07:35', '1999', 150, 'Viên Sùng Hoán, Viên Thừa Chí, Hạ Thanh Thanh , Hạ Tuyết Nghi, A Cửu', 'Huỳnh Thánh Y', 2, '-P8m78gA1Rw', 32),
(34, 'Lộc Đỉnh ký', 'Câu chuyện xoay quanh một nhân vật chính có hình ảnh pha trộn giữa tốt xấu, thiện ác, đồng thời trọng tình nghĩa bạn bè, có chí hiến thân vì nước nhưng cũng tiểu nhân gian xảo, mưu mô thủ đoạn, sẵn sàng hại bạn khi cần bảo vệ lợi ích của mình tên gọi Vi Tiểu Bảo. Bảo là con của Vi Xuân Phương, một kỹ nữ tại Lệ Xuân viện, một kỹ viện khá nổi tiếng tại Dương Châu. Ngay cả Vi Xuân Phương cũng không biết cha của cậu là ai, mọi người trong Lệ Xuân viện gọi cậu là Tiểu Bảo, sau này có người hỏi tới thì cậu lấy họ mẹ.\r\n\r\nỞ hồi thứ nhất, tác giả chưa nói đến những nhân vật chính mà mở đầu truyện với một vụ thảm án văn tự ngục có thật xảy ra tại nhà họ Trang ở Hồ Châu, thông qua lời trò chuyện của ba vị danh sĩ Cố Viêm Vũ, Hoàng Tông Hy và Lã Lưu Lương. Nhà phú hộ họ Trang có người con trưởng tên Trang Đình Long bị mù, thích đọc sách, mua được nguyên cảo bộ sách Minh sử của hậu duệ tác giả - Thừa tướng Chu Quốc Trinh thời nhà Minh. Bộ sách này vốn đã nổi tiếng, đây lại là nguyên cảo, có nhiều truyện mà bản phổ thông không có, Trang Đình Long muốn xuất bản nên mời rất nhiều danh sỹ khắp vùng Chiết Giang tới giúp tu sửa, hiệu đính. Khi đó Ngao Bái cầm quyền, có tư tưởng bài xích người Hán, việc làm sách tưởng nhớ tiền triều vốn cực kỳ nhạy cảm, người tu sửa cuối cùng lại căm hận nhà Thanh cùng cực, quyết ý chỉ dùng niên hiệu nhà Minh, trong sách cũng có nhiều ngôn từ khen nhà Minh chê nhà Thanh, kết quả tên tiểu nhân Ngô Chi Vinh đắc thể, tố cáo với Ngao Bái, khiến từ người soạn sách, người tu sửa, người đóng sách, in sách tới người bán sách, đọc sách, quan lại địa phương đều chịu kết quả thảm khốc. Nhẹ thì cắt chức, sung quân, nặng thì lăng trì, chém nam giới cả nhà, treo cổ,... Gần một ngàn người chết thảm khốc, còn Ngô Chi Vinh từ một tên tham quan bị cách chức lại được thăng thưởng lên làm tri phủ. Từ vụ án này lại nói tới chuyện tương ngộ của danh sỹ Tra Y Hoàng và Thiết cái Ngô Lục Kỳ, giới thiệu Thiên Địa hội, Trần Cận Nam, mở ra mâu thuẫn chính trong suốt toàn mạch truyện, giữa nhà Thanh và Thiên Địa hội - tổ chức kháng Thanh lớn nhất đương thời, với chủ nghĩa \"Phản Thanh phục Minh\".', 1, 'phim bộ', 'locdinhky5854.jpg', 6, 6, 10, 'loc-dinh-ky', 7, 1, 4, '鹿鼎记 鹿鼎記', 1, '2023-01-31 15:30:25', '2023-01-31 15:30:25', '2003', 45, 'Vi Tiểu Bảo, Ngao Bái, Khang Hy, Ngô Tam Quế, Kim Dung', 'Trần Tiểu Xuân, La Quán Lan, Phùng Hiểu Văn, Trần Thiếu Hà, Lương Tiểu Băng', NULL, 'InXxCYX6l7E', 45),
(35, 'Lật mặt', 'Lật mặt xoay quanh cuộc sống của Khải, một người sống trong cảnh nghèo khổ nên luôn mong muốn đổi đời. Anh cùng người bạn thân là Thắng tham gia nhóm người đào kim cương trong rừng sâu. Hai người may mắn đào được ba viên kim cương thô. Họ phải chia lại một nửa cho Dũng, tên cầm đầu nhóm giang hồ bảo kê khu vực. Lòng tham vô đáy khiến Dũng trở nên độc ác khi muốn giết hại đôi bạn để có được toàn bộ số kim cương quý giá. Khải may mắn thoát chết nhưng bất lực chứng kiến cảnh bạn mình bị giết hại. Khải sau đó bị công an và nhóm côn đồ của Dũng truy đuổi, anh đi lang thang trong rừng và gặp được bà Loan - một nhà ngoại cảm. Anh xin làm việc tại vườn rau củ của hai vợ chồng già, nhưng TV đưa tin anh đang bị truy nã khiến anh phải tiếp tục bỏ chạy. Khải xin thức ăn của một người phụ nữ, chồng của cô ta về nhà thấy nên nổi cơn ghen tuông khiến anh lại rời đi. Khải quyết định lên Sài Gòn để bán kim cương, anh thuê một anh chàng xe ôm tên Toàn chở mình đi. Lên đến Sài Gòn, Khải đến nhà một người quen, ngờ đâu lại bị công an truy đuổi. Toàn không hiểu chuyện gì đang xảy ra nhưng anh cũng giúp Khải chạy thoát thành công. Khải bán một viên kim cương nhỏ và có được số tiền lớn, anh hào phóng tặng 50 triệu đồng cho Toàn như là lời cảm ơn anh ta. Toàn gọi điện cho người yêu thì đau lòng khi biết được cô ta đã bỏ anh để đi theo một người giàu có. Nhóm của Dũng cũng lên Sài Gòn truy tìm Khải. Một tên đàn em của Dũng được giao nhiệm vụ theo dõi Huế - vợ của Khải, và cô cũng đang là đối tượng bị công an theo dõi. Tên côn đồ cố gắng cưỡng hiếp Huế, may mắn là một người công an đã cứu cô. Khải bảo Huế lên Sài Gòn với anh, anh dặn cô coi chừng công an đi theo cô.', 1, 'phim lẻ', 'Lat_mat_2015_poster8111.jpg', 8, 8, 1, 'lat-mat', 6, 1, 1, 'Flip face', 0, '2023-01-30 17:30:17', '2023-01-30 17:30:17', '2020', 60, 'Lý Hải,\r\nTrường Giang ,\r\nVõ Thành Tâm ,\r\nLâm Minh Thắng ,\r\nMỹ Hòa ,\r\nLong Đẹp Trai ,\r\nHứa Minh Đạt,', 'Lý Hải', 0, NULL, 1),
(36, 'Hẻm Cụt', 'HẺM CỤT FULL | NS Ngọc Giàu, NS Việt Anh, Trấn Thành, Lê Giang, Dương Lâm, Quốc Khánh, Hoàng Mèo, Kim Nhã, Lộ Lộ, AQuay, Trúc Trân, Kim Đào, Trọng Hiếu, Bé Bảo Nhi\r\n#TranThanh #HemCut #Lazada #phimhaitet #phimhaitet2022 #LeGiang #BaoLam #QuocKhanh #phimhai\r\n------------------------------\r\nChào mừng bạn đến với Youtube chính thức được trực tiếp quản lý bởi MC Trấn Thành, những thành viên của gia đình TRAN THANH Official và METUB Network.\r\nCác bạn nhớ Subscribe, Like và Share để ủng hộ tinh thần cho Trấn Thành và nhận được những thông tin, video mới nhất về các hoạt động nghệ thuật của MC Trấn Thành  nhé.\r\nFanpage chính thức:\r\nhttps://www.facebook.com/tran.thanh.ne\r\n\r\nKênh youtube chính thức: http://metub.net/tranthanh\r\n\r\nRất cảm ơn các anh chị, các bạn đã ủng hộ chúng tôi trong suốt thời gian qua!', 1, 'phim lẻ', 'hemcut5619.jpg', 5, 6, 1, 'hem-cut', 3, 0, 4, 'Dragon Sign', 0, '2023-01-30 17:30:08', '2023-01-30 17:30:08', '2020', 400, 'NS Ngọc Giàu, NS Việt Anh, Trấn Thành, Lê Giang, Dương Lâm, Quốc Khánh, Hoàng Mèo, Kim Nhã, Lộ Lộ, AQuay, Trúc Trân, Kim Đào, Trọng Hiếu, Bé Bảo Nhi', 'NS Ngọc Giàu, NS Việt Anh, Trấn Thành, Lê Giang, Dương Lâm, Quốc Khánh, Hoàng Mèo, Kim Nhã, Lộ Lộ, A Quay, Trúc Trân, Kim Đào, Trọng Hiếu, Bé Bảo Nhi', NULL, 'TnMrrg9ssXA', 1),
(37, 'Tây du ký', 'Trong tiểu thuyết, Trần Huyền Trang (陳玄奘) được Quan Âm Bồ Tát bảo đến Tây Trúc (Ấn Độ) thỉnh kinh Phật giáo mang về Trung Quốc. Theo ông là 4 đệ tử - một khỉ đá tên Tôn Ngộ Không (孫悟空), một yêu quái nửa người nửa lợn tên Trư Ngộ Năng (豬悟能) và một thủy quái tên Sa Ngộ Tĩnh (沙悟淨) - họ đều đồng ý giúp ông thỉnh kinh để chuộc tội. Con ngựa Huyền Trang cưỡi cũng là một hoàng tử của Long Vương (Bạch Long Mã).\r\n\r\nNhững chương đầu thuật lại những kì công của Tôn Ngộ Không, từ khi ra đời từ một hòn đá ở biển Hoa Đông, xưng vương ở Hoa Quả Sơn, tìm sư học đạo, đại náo thiên cung, sau đó bị Phật Tổ Như Lai bắt nhốt trong Ngũ Hành Sơn 500 năm. Truyện kể lại Huyền Trang trở thành một nhà sư ra sao và được hoàng đế nhà Đường gửi đi thỉnh kinh sau khi hoàng đế thoát chết.[cần dẫn nguồn]\r\n\r\nPhần tiếp của câu chuyện kể về các hiểm nguy mà thầy trò Đường Tam Tạng phải đối đầu, trong đó nhiều yêu quái là đồ đệ của các vị Tiên, Phật. Một số yêu tinh muốn ăn thịt Huyền Trang, một số khác muốn cám dỗ họ bằng cách biến thành những mỹ nhân. Tôn Ngộ Không phải sử dụng phép thuật và quan hệ của mình với thế giới yêu quái và Tiên, Phật để đánh bại các kẻ thù nhiều mánh khóe, như Ngưu Ma Vương hay Thiết Phiến Công chúa,...\r\n\r\nCuối cùng khi đã đến cửa Phật, thầy trò họ lại phải đổi Bát vàng của Hoàng đế Đường Thái Tông tặng để nhận được kinh thật. Đây cũng được tính là một khổ nạn cho bốn thầy trò. Khi qua sông Thông Thiên, Tam Tạng gặp lại Lão Rùa năm xưa chở ông qua sông. Khi đang chở Tam Tạng qua giữa sông, Lão Rùa hỏi Tam Tạng rằng ông có hỏi Phật Tổ giúp lão rằng bao giờ lão tu đắc chính quả không, vì Tam Tạng quên hỏi nên bị Lão Rùa hất cả bốn thầy trò lẫn kinh văn xuống sông. Kinh văn bị ướt, sau khi phơi khô một số bị rách. Vì thế mà kinh về đến Trung thổ không được toàn vẹn.', 1, '', 'taydu2635.jpg', 5, 8, 10, 'tay-du-ky', 0, 1, 0, 'Journey to the West', 1, '2023-01-30 17:00:03', '2023-01-30 17:00:03', NULL, 45, 'Thái Thượng Lão Quân,\r\nNgọc Hoàng Thượng đế,\r\nTây Vương Mẫu,\r\nXích Cước Tiên,\r\nThái Bạch Kim Tinh,\r\nNa Tra Tam Thái Tử,\r\nThác Tháp Thiên Vương Lý Tịnh,\r\nBát Tiên,\r\nHằng Nga,\r\nThổ Địa,\r\nPhật tổ Như Lai,\r\nPhật A Di Đà,\r\nPhật Di-lặc,\r\nQuán Thế Âm Bồ Tát,\r\nĐịa Tạng Bồ Tát,\r\nĐại Thế Chí Bồ Tát,\r\nVăn Thù Bồ Tát,\r\nPhổ Hiền Bồ Tát,\r\nCác vị La Hán,', 'Lục Tiểu Linh Đồng, Từ Thiếu Hoa,', 1, NULL, 36),
(38, 'Kẻ báo thù đầu tiên', 'Captain America: Kẻ báo thù đầu tiên[4] (tựa gốc tiếng Anh: Captain America: The First Avenger) là một bộ phim siêu anh hùng của Mỹ năm 2011 dựa trên nhân vật Captain America của Marvel Comics. Được sản xuất bởi Marvel Studios và phát hành bởi Paramount Pictures,[N 1] đây là bộ phim thứ 5 trong Vũ trụ Điện ảnh Marvel (MCU). Phim do Joe Johnston đạo diễn, Christopher Markus và Stephen McFeely viết kịch bản, và có sự tham gia của Chris Evans trong vai Steve Rogers / Captain America cùng với Tommy Lee Jones, Hugo Weaving, Hayley Atwell, Sebastian Stan, Dominic Cooper, Neal McDonough, Derek Luke và Stanley Tucci. Trong Thế chiến Hai, Steve Rogers, một người đàn ông yếu đuối, được biến thành siêu chiến binh Captain America và phải ngăn Red Skull (Weaving) sử dụng Tesseract làm nguồn năng lượng để thống trị thế giới.\r\n\r\nBộ phim bắt đầu như một ý tưởng vào năm 1997 và được lên kế hoạch phân phối bởi Artisan Entertainment. Tuy nhiên, một vụ kiện đã làm gián đoạn dự án và không được giải quyết cho đến tháng 9 năm 2003. Năm 2005, Marvel Studios nhận được một khoản vay từ Merrill Lynch, và lên kế hoạch tài trợ và phát hành bộ phim thông qua Paramount Pictures. Các đạo diễn Jon Favreau và Louis Leterrier quan tâm đến việc chỉ đạo dự án trước khi Johnston được tiếp cận vào năm 2008. Các nhân vật chính đã được chọn từ tháng 3 đến tháng 6 năm 2010. Quá trình sản xuất bắt đầu vào tháng 6, và quay phim diễn ra ở London, Manchester, Caerwent, Liverpool và Los Angeles. Một số kỹ thuật khác nhau đã được công ty hiệu ứng hình ảnh Lola sử dụng để tạo ra ngoại hình của nhân vật trước khi anh ta trở thành Captain America.\r\n\r\nCaptain America: Kẻ báo thù đầu tiên được công chiếu lần đầu tại Nhà hát El Capitan vào ngày 19 tháng 7 năm 2011 và được phát hành tại Hoa Kỳ vào ngày 22 tháng 7, như một phần của Giai đoạn Một của MCU. Phim thành công về mặt thương mại, thu về hơn 370 triệu đô la trên toàn thế giới. Các nhà phê bình đặc biệt khen ngợi màn trình diễn của Evans, sự miêu tả của bộ phim về khoảng thời gian những năm 1940 và sự chỉ đạo của Johnston. Hai phần tiếp theo của phim đã được phát hành: Captain America: Chiến binh mùa đông (2014) và Captain America: Nội chiến siêu anh hùng (2016).', 1, 'phim lẻ', 'Poster_Captain_America_Kẻ_báo_thù_đầu_tiên_20113001.jpg', 8, 6, 7, 'ke-bao-thu-dau-tien', 1, 0, 4, 'Captain America', 0, '2023-01-31 15:18:16', '2023-01-31 15:18:16', NULL, 190, 'Một ngày nọ, các nhà khoa học S.H.I.E.L.D. ở Bắc Cực đã tìm thấy xác một máy bay cỡ lớn. Kiểm tra ở trong, hai người phát hiện một vật thể bị đóng băng có 3 vòng màu đỏ, trắng và xanh lam và một ngôi sao trắng ở giữa. Thấy vậy, một người yêu cầu báo tin ngay cho \"đại tá\".', NULL, 1, 'v=DxX0Bhuzjbg', 1),
(39, 'Annabelle', 'Trong phim, để ngăn Annabelle hoành hành, vợ chồng Ed và Lorraine Warren (Patrick Wilson và Vera Farmiga đóng) đưa nó về căn phòng đặc biệt - nơi họ giữ các đồ vật có hiện tượng kỳ lạ sau nhiều năm hành nghề trừ tà. Tuy nhiên, Annabelle đánh thức các linh hồn tà ác khác trong phòng. Nó nhắm đến Judy (Mckenna Grace) - con gái nhà Warren - cùng hai bảo mẫu của cô bé (Madison Iseman và Katie Sarife đóng).', 1, 'phim lẻ', 'unnamed4432.webp', 8, 7, 7, 'annabelle', 2, 1, 4, 'Annabelle', 1, '2023-01-31 15:20:17', '2023-01-31 15:20:17', '2020', 180, 'Tác phẩm là phim thứ sáu trong Vũ trụ Kinh dị Conjuring do James Wan sáng tạo. Annabelle là nhân vật phản diện nổi bật của series này, từng xuất hiện trong hai phần Conjuring và hai phần Annabelle. Phim gần nhất về búp bê ma - Annabelle: Creation (2017) - thu 306 triệu USD toàn cầu, trong khi kinh phí chỉ có 15 triệu USD. Ở Việt Nam, tác phẩm gây sốt khi thu 100 tỷ đồng, cao thứ tư phòng vé Việt năm 2017.', NULL, 1, 'v=BTbw9Ws0M7Y', 1),
(42, 'Nhà bà nữ', 'Nhà bà Nữ là một bộ phim điện ảnh chính kịch, gia đình do Trấn Thành sản xuất và làm đạo diễn. Bộ phim do Đỗ Hoàng Vũ, quản lý của Trấn Thành và Hari Won đảm nhận vai trò đồng sản xuất. Đây là bộ phim thứ hai do Trấn Thành làm đạo diễn sau Bố già, bộ phim có doanh thu cao nhất lịch sử phòng vé Việt Nam.', 1, 'phim lẻ', 'Áp_phích_phim_Nhà_bà_Nữ5858.jpg', 5, 6, 1, 'nha-ba-nu', NULL, 1, 4, 'lady\'s house', 1, '2023-01-30 17:28:54', '2023-01-30 17:28:54', '2020', 180, 'Trấn Thành, Lê Giang, NSND Ngọc Giàu, Uyển Ân, Khả Như, NSND Việt Anh, NSUT Công Ninh, Ngân Quỳnh, Song Luân, Lê Dương Bảo Lâm, Lý Hạo Mạnh Quỳnh, Phương Lan, Hoàng Mèo,', 'Trấn Thành, Lê Giang, Ngọc Giàu, Uyển Ân, Khả Như,Việt Anh, Công Ninh, Ngân Quỳnh, Song Luân, Lê Dương Bảo Lâm, Lý Hạo Mạnh Quỳnh, Phương Lan, Hoàng Mèo', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_id` int(20) NOT NULL,
  `genre_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(35, 38, 6),
(38, 38, 6),
(40, 37, 2),
(41, 37, 4),
(42, 37, 8),
(44, 36, 2),
(45, 36, 4),
(46, 36, 6),
(47, 35, 3),
(48, 35, 6),
(49, 35, 8),
(50, 34, 4),
(51, 34, 6),
(52, 27, 2),
(53, 27, 4),
(54, 27, 8),
(55, 30, 2),
(56, 30, 4),
(57, 30, 6),
(58, 20, 2),
(59, 20, 4),
(60, 29, 3),
(61, 29, 4),
(62, 29, 8),
(63, 28, 3),
(64, 28, 4),
(65, 28, 8),
(66, 33, 3),
(67, 33, 4),
(68, 33, 8),
(69, 26, 3),
(70, 26, 4),
(71, 26, 8),
(72, 32, 2),
(73, 32, 4),
(74, 32, 8),
(75, 31, 3),
(76, 31, 6),
(77, 31, 8),
(78, 25, 2),
(79, 25, 4),
(80, 25, 8),
(83, 22, 4),
(84, 22, 6),
(85, 22, 9),
(94, 39, 3),
(95, 39, 7),
(110, 31, 4),
(111, 31, 9),
(112, 42, 2),
(113, 42, 4),
(114, 42, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tri', 'tri@gmail.com', NULL, '$2y$10$G7Z6VDdUeRC3kuXIz0SKquKnE2Xwsy7ewhU4KisN4hqqCA6b/Au3q', NULL, '2022-12-15 07:08:53', '2022-12-15 07:08:53');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
