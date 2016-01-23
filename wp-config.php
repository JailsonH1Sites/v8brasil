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
define('DB_NAME', 'v8brasil');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'CkQn*TD70$~gWoCv?:]c,dk-RQiFH(|bmKV-?:eLBsG y%+K;(0YenUXm(h2;ig+');
define('SECURE_AUTH_KEY',  '06i|NrnFM7Xq34@dMjtJ; }<G,_N+]Rl/D)RWI/OyL*Yhq~=?O#*-,B0:+@6mb}h');
define('LOGGED_IN_KEY',    'wnEf p7PD>SdWt=0BR5QA$*R>yPb)S8GHDNvH-VNG<.+JT)xZPjm9/hsfw3{2!4g');
define('NONCE_KEY',        'w5M5r s|fpDRfKOZD{q8g+{MV9o->XYnp~F+&jqoq^#4>t#UHWRHs|NE-G>#Pni9');
define('AUTH_SALT',        '+uFn.CZk5wk^cU O(/Pn8ijggN 9-h!OJBovLNB4F5~=~[zWY<,{n:?bA6+VsW!|');
define('SECURE_AUTH_SALT', 'hxxusj>WVHLld H!_5h@XYOh&f=aJ`c%W-I|r-V`8wceIBZDde`<sO+3S}2{(_A>');
define('LOGGED_IN_SALT',   'ucvkncAe.FUQ*ip];H2rYzK{b+RMXDjsaj-Py-*mhS5x?>{sTB*111|!~!Dz{ L0');
define('NONCE_SALT',       'N|D4Q+S`kQxd62]@bClfCrvgOiPUJt{{j!bU(y/},ILL&fLJu6?i9 o0yuIi^yNr');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wv8p_';


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
