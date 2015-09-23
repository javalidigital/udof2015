<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'WPudof');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'udof');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'CB%UE;W7XL');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '(p(zF?_Q{Q~f.ON1z>cU-, 7O[&-WM_q!Y6qEIf~zDMT6.!7gK}4EWIz+xxYHd`_');
define('SECURE_AUTH_KEY',  'd-+P-%L@1V?VK1JL.$$eZ[=cpH*+d|`ak1xZUe0SLu[N&CVN|n(_Ft$WMzOU4D8i');
define('LOGGED_IN_KEY',    'S-x~|=>syqs+ INFO3NM3~1{-k3:fH7&xq{TU&D.TAqhEzZa+<Mrk*)BFW^X3gs7');
define('NONCE_KEY',        '2Hn{r%6E+me)DU8ZpWE.xP6 0&fZ90^MQ?Z.J$8d[Ul#&jd#Y4Bf`OmYT@u<;~k#');
define('AUTH_SALT',        '/]H4Iyq#G-[jq#R]Bn.,^D|r+dO+v<1p+j=#9{lq7Vl{MQ--B`^O,_cPKBm/QlgW');
define('SECURE_AUTH_SALT', 'a$++lv>^_; Uy<^K+,u^Nda6aX],!9SAilvgN/O>op3A_&aP_T]_u7zy9s(<Rx,5');
define('LOGGED_IN_SALT',   '5r)cHjHm9?trLWQms{wN.8f61pJ_hyezq0GgO>oM|bA#ZZi96UlKo$R2_+CotXuf');
define('NONCE_SALT',       '@a~aa@$%1u>sAqMl86^T0#aXD#H?y=3YM3<g7oG$AEan%y:0%RG-X:8~0M<qVc@6');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
