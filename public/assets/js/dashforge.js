/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/js/dashforge.js":
/*!******************************************!*\
  !*** ./resources/assets/js/dashforge.js ***!
  \******************************************/
/***/ (() => {

$(function () {
  // 'use strict'
  // feather.replace();
  ////////// NAVBAR //////////
  // Initialize PerfectScrollbar of navbar menu for mobile only
  if (window.matchMedia('(max-width: 991px)').matches) {
    var _psNavbar = new PerfectScrollbar('#navbarMenu', {
      suppressScrollX: true
    });
  } // Showing sub-menu of active menu on navbar when mobile


  function showNavbarActiveSub() {
    if (window.matchMedia('(max-width: 991px)').matches) {
      $('#navbarMenu .active').addClass('show');
    } else {
      $('#navbarMenu .active').removeClass('show');
    }
  }

  showNavbarActiveSub();
  $(window).resize(function () {
    showNavbarActiveSub();
  }); // Initialize backdrop for overlay purpose

  $('body').append('<div class="backdrop"></div>'); // Showing sub menu of navbar menu while hiding other siblings

  $('.navbar-menu .with-sub .nav-link').on('click', function (e) {
    e.preventDefault();
    $(this).parent().toggleClass('show');
    $(this).parent().siblings().removeClass('show');

    if (window.matchMedia('(max-width: 991px)').matches) {
      psNavbar.update();
    }
  }); // Closing dropdown menu of navbar menu

  $(document).on('click touchstart', function (e) {
    e.stopPropagation(); // closing nav sub menu of header when clicking outside of it

    if (window.matchMedia('(min-width: 992px)').matches) {
      var navTarg = $(e.target).closest('.navbar-menu .nav-item').length;

      if (!navTarg) {
        $('.navbar-header .show').removeClass('show');
      }
    }
  });
  $('#mainMenuClose').on('click', function (e) {
    e.preventDefault();
    $('body').removeClass('navbar-nav-show');
  });
  $('#sidebarMenuOpen').on('click', function (e) {
    e.preventDefault();
    $('body').addClass('sidebar-show');
  }); // Navbar Search

  $('#navbarSearch').on('click', function (e) {
    e.preventDefault();
    $('.navbar-search').addClass('visible');
    $('.backdrop').addClass('show');
  });
  $('#navbarSearchClose').on('click', function (e) {
    e.preventDefault();
    $('.navbar-search').removeClass('visible');
    $('.backdrop').removeClass('show');
  }); ////////// SIDEBAR //////////
  // Initialize PerfectScrollbar for sidebar menu

  if ($('#sidebarMenu').length) {
    var psSidebar = new PerfectScrollbar('#sidebarMenu', {
      suppressScrollX: true
    }); // Showing sub menu in sidebar

    $('.sidebar-nav .with-sub').on('click', function (e) {
      e.preventDefault();
      $(this).parent().toggleClass('show');
      psSidebar.update();
    });
  }

  $('#mainMenuOpen').on('click touchstart', function (e) {
    e.preventDefault();
    $('body').addClass('navbar-nav-show');
  });
  $('#sidebarMenuClose').on('click', function (e) {
    e.preventDefault();
    $('body').removeClass('sidebar-show');
  }); // hide sidebar when clicking outside of it

  $(document).on('click touchstart', function (e) {
    e.stopPropagation(); // closing of sidebar menu when clicking outside of it

    if (!$(e.target).closest('.burger-menu').length) {
      var sb = $(e.target).closest('.sidebar').length;
      var nb = $(e.target).closest('.navbar-menu-wrapper').length;

      if (!sb && !nb) {
        if ($('body').hasClass('navbar-nav-show')) {
          $('body').removeClass('navbar-nav-show');
        } else {
          $('body').removeClass('sidebar-show');
        }
      }
    }
  });
});

/***/ }),

/***/ "./resources/assets/css/dashforge.auth.css":
/*!*************************************************!*\
  !*** ./resources/assets/css/dashforge.auth.css ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/css/dashforge.landing.css":
/*!****************************************************!*\
  !*** ./resources/assets/css/dashforge.landing.css ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/css/dashforge.dashboard.css":
/*!******************************************************!*\
  !*** ./resources/assets/css/dashforge.dashboard.css ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/lib/@fortawesome/fontawesome-free/css/all.min.css":
/*!****************************************************************************!*\
  !*** ./resources/assets/lib/@fortawesome/fontawesome-free/css/all.min.css ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/lib/ionicons/css/ionicons.min.css":
/*!************************************************************!*\
  !*** ./resources/assets/lib/ionicons/css/ionicons.min.css ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/lib/jqvmap/jqvmap.min.css":
/*!****************************************************!*\
  !*** ./resources/assets/lib/jqvmap/jqvmap.min.css ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/css/dashforge.css":
/*!********************************************!*\
  !*** ./resources/assets/css/dashforge.css ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/css/dashforge.profile.css":
/*!****************************************************!*\
  !*** ./resources/assets/css/dashforge.profile.css ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/assets/js/dashforge": 0,
/******/ 			"assets/css/dashforge": 0,
/******/ 			"assets/css/dashforge.profile": 0,
/******/ 			"assets/lib/jqvmap/jqvmap.min": 0,
/******/ 			"assets/lib/ionicons/css/ionicons.min": 0,
/******/ 			"assets/lib/@fortawesome/fontawesome-free/css/all.min": 0,
/******/ 			"assets/css/dashforge.dashboard": 0,
/******/ 			"assets/css/dashforge.landing": 0,
/******/ 			"assets/css/dashforge.auth": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["assets/css/dashforge","assets/css/dashforge.profile","assets/lib/jqvmap/jqvmap.min","assets/lib/ionicons/css/ionicons.min","assets/lib/@fortawesome/fontawesome-free/css/all.min","assets/css/dashforge.dashboard","assets/css/dashforge.landing","assets/css/dashforge.auth"], () => (__webpack_require__("./resources/assets/js/dashforge.js")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/dashforge","assets/css/dashforge.profile","assets/lib/jqvmap/jqvmap.min","assets/lib/ionicons/css/ionicons.min","assets/lib/@fortawesome/fontawesome-free/css/all.min","assets/css/dashforge.dashboard","assets/css/dashforge.landing","assets/css/dashforge.auth"], () => (__webpack_require__("./resources/assets/lib/@fortawesome/fontawesome-free/css/all.min.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/dashforge","assets/css/dashforge.profile","assets/lib/jqvmap/jqvmap.min","assets/lib/ionicons/css/ionicons.min","assets/lib/@fortawesome/fontawesome-free/css/all.min","assets/css/dashforge.dashboard","assets/css/dashforge.landing","assets/css/dashforge.auth"], () => (__webpack_require__("./resources/assets/lib/ionicons/css/ionicons.min.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/dashforge","assets/css/dashforge.profile","assets/lib/jqvmap/jqvmap.min","assets/lib/ionicons/css/ionicons.min","assets/lib/@fortawesome/fontawesome-free/css/all.min","assets/css/dashforge.dashboard","assets/css/dashforge.landing","assets/css/dashforge.auth"], () => (__webpack_require__("./resources/assets/lib/jqvmap/jqvmap.min.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/dashforge","assets/css/dashforge.profile","assets/lib/jqvmap/jqvmap.min","assets/lib/ionicons/css/ionicons.min","assets/lib/@fortawesome/fontawesome-free/css/all.min","assets/css/dashforge.dashboard","assets/css/dashforge.landing","assets/css/dashforge.auth"], () => (__webpack_require__("./resources/assets/css/dashforge.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/dashforge","assets/css/dashforge.profile","assets/lib/jqvmap/jqvmap.min","assets/lib/ionicons/css/ionicons.min","assets/lib/@fortawesome/fontawesome-free/css/all.min","assets/css/dashforge.dashboard","assets/css/dashforge.landing","assets/css/dashforge.auth"], () => (__webpack_require__("./resources/assets/css/dashforge.profile.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/dashforge","assets/css/dashforge.profile","assets/lib/jqvmap/jqvmap.min","assets/lib/ionicons/css/ionicons.min","assets/lib/@fortawesome/fontawesome-free/css/all.min","assets/css/dashforge.dashboard","assets/css/dashforge.landing","assets/css/dashforge.auth"], () => (__webpack_require__("./resources/assets/css/dashforge.auth.css")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/dashforge","assets/css/dashforge.profile","assets/lib/jqvmap/jqvmap.min","assets/lib/ionicons/css/ionicons.min","assets/lib/@fortawesome/fontawesome-free/css/all.min","assets/css/dashforge.dashboard","assets/css/dashforge.landing","assets/css/dashforge.auth"], () => (__webpack_require__("./resources/assets/css/dashforge.landing.css")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["assets/css/dashforge","assets/css/dashforge.profile","assets/lib/jqvmap/jqvmap.min","assets/lib/ionicons/css/ionicons.min","assets/lib/@fortawesome/fontawesome-free/css/all.min","assets/css/dashforge.dashboard","assets/css/dashforge.landing","assets/css/dashforge.auth"], () => (__webpack_require__("./resources/assets/css/dashforge.dashboard.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;