/******/ (function (modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if (installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
      /******/
    }
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
      /******/
    };
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
    /******/
  }
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function (exports, name, getter) {
/******/ 		if (!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
      /******/
    }
    /******/
  };
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function (exports) {
/******/ 		if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
      /******/
    }
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
    /******/
  };
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function (value, mode) {
/******/ 		if (mode & 1) value = __webpack_require__(value);
/******/ 		if (mode & 8) return value;
/******/ 		if ((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if (mode & 2 && typeof value != 'string') for (var key in value) __webpack_require__.d(ns, key, function (key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
    /******/
  };
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function (module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
    /******/
  };
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function (object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
  /******/
})
/************************************************************************/
/******/({

/***/ "./resources/js/like.js":
/*!******************************!*\
  !*** ./resources/js/like.js ***!
  \******************************/
/*! no static exports found */
/***/ (function (module, exports) {

      $(function () {
        var like = $('.like-toggle'); //like-toggleのついたタグを取得し代入。
        var likePostId; //変数を宣言
        like.on('click', function () {
          //onはイベントハンドラー
          var $this = $(this); //this=イベントの発火した要素＝タグを代入
          likePostId = $this.data('post-id'); //タグに仕込んだdata-post-idの値を取得
          //ajax処理スタート
          $.ajax({
            headers: {
              //HTTPヘッダ情報をヘッダ名と値のマップで記述
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
            url: '/like',
            //通信先アドレスで、このURLをあとでルートで設定します
            method: 'POST',
            //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
            data: {
              //サーバーに送信するデータ
              'post_id': likePostId //いいねされた投稿のidを送る
            }
          })
            //通信成功した時の処理
            .done(function (data) {
              $this.toggleClass('liked'); //likedクラスのON/OFF切り替え。
              $this.next('.like-counter').html(data.post_likes_count);//総いいね数
            })
            //通信失敗した時の処理
            .fail(function () {
              console.log('fail');
            });
        });
      });

      /***/
    }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/like.js ***!
  \************************************/
/*! no static exports found */
/***/ (function (module, exports, __webpack_require__) {

      module.exports = __webpack_require__(/*! /var/www/html/resources/js/like.js */"./resources/js/like.js");


      /***/
    })

  /******/
});