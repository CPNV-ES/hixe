/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/hixe-form.js":
/*!***********************************!*\
  !*** ./resources/js/hixe-form.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

document.addEventListener("DOMContentLoaded", function () {
  function addRow(parent) {
    var rows = parent.querySelectorAll('tbody tr');
    var lastRow = rows.last().cloneNode(true);
    rows.forEach(function (elem) {
      elem.querySelector('.btn').hidden = false;
    }); // Unfill content of input when added

    lastRow.querySelectorAll('input').forEach(function (elem) {
      elem.value = "";
    });
    lastRow.querySelector('.btn').addEventListener('click', function (a) {
      // () => Is like function() but doesn't keep the scope
      deleteRow(lastRow);
    });
    parent.querySelector('tbody').appendChild(lastRow);
  }

  function deleteRow(child) {
    var parent = child.parentElement;
    parent.removeChild(child);

    if (parent.querySelectorAll('tr').length <= 1) {
      parent.querySelector('.btn').hidden = true;
    }
  } // Add course row on click


  tableTraining.querySelector('tbody').addEventListener('change', function (evt) {
    addRow(evt.target.parentElement.parentElement.parentElement.parentElement);
    evt.target.addEventListener('change', function (evt) {
      evt.stopPropagation();
    });
  });
  tableTraining.querySelectorAll('button[name="remove-cours"]').forEach(function (element) {
    element.addEventListener("click", function (evt) {
      deleteRow(element.parentElement.parentElement.parentElement);
    });
  });
  tableMaterial.querySelectorAll('button[name="remove-material"]').forEach(function (element) {
    element.addEventListener("click", function (evt) {
      deleteRow(element.parentElement.parentElement.parentElement);
    });
  }); // Add material row on click

  tableMaterial.querySelector('tbody').addEventListener('change', function (evt) {
    addRow(evt.target.parentElement.parentElement.parentElement.parentElement);
    evt.target.addEventListener('change', function (evt) {
      evt.stopPropagation();
    });
  }); // Add step for hike

  addRowStep.addEventListener('click', function () {
    addStep(this.parentElement.querySelector('table tbody tr'));
  });
  document.querySelectorAll('tbody .btn').forEach(function (elem) {
    elem.addEventListener('click', function () {
      deleteRow(elem.parentElement.parentElement.parentElement);
    });
  });

  function addStep(elem) {
    // Contain the step input
    var newStep = elem.cloneNode(true); // Unifll content

    newStep.querySelector('input').value = ''; // Show delete button

    newStep.querySelector('button').hidden = false; // Delete step

    newStep.querySelector('button').addEventListener('click', function () {
      deleteRow(newStep);
    }); // Insert clone before destination id

    elem.parentNode.insertBefore(newStep, destination);
    addSearchAutocomplete();
  }

  addSearchAutocomplete();
});

function addSearchAutocomplete() {
  document.querySelectorAll('.destination-input').forEach(function (input) {
    input.addEventListener('keyup', function () {
      var query = input.value;

      if (query != '') {
        var _token = $('input[name="_token"]').val();

        $.ajax({
          url: input.dataset.url,
          method: "POST",
          data: {
            query: query,
            _token: _token
          },
          success: function success(data) {
            var list = input.parentElement.parentElement; // Remove redudant query content from autocomplete list

            if (document.querySelector('#destinationList')) destinationList.remove(); // Convert DOM's text in HTML format

            var doc = new DOMParser().parseFromString(data, "text/xml");
            list.appendChild(doc.documentElement);
            list = destinationList;
            list.querySelectorAll("li").forEach(function (li) {
              li.addEventListener("click", function () {
                input.value = li.innerHTML; // remove list's content when element selected

                list.remove();
              });
            });
          }
        });
      }
    });
  });
}

/***/ }),

/***/ 1:
/*!*****************************************!*\
  !*** multi ./resources/js/hixe-form.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/Xavier/MAMP/htdocs/hixe/resources/js/hixe-form.js */"./resources/js/hixe-form.js");


/***/ })

/******/ });