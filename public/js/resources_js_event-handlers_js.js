"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_event-handlers_js"],{

/***/ "./resources/js/event-handlers.js":
/*!****************************************!*\
  !*** ./resources/js/event-handlers.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "EventHandlers": () => (/* binding */ EventHandlers)
/* harmony export */ });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var EventHandlers = /*#__PURE__*/function () {
  function EventHandlers() {
    _classCallCheck(this, EventHandlers);
  }

  _createClass(EventHandlers, [{
    key: "todoCreated",
    value: function todoCreated(data) {
      if (data.todo) {
        app.items.unshift(data.todo);
      }
    }
  }, {
    key: "todoUpdated",
    value: function todoUpdated(data) {
      if (data.todo) {
        app.items.forEach(function (itm) {
          if (itm.id == data.todo.id) {
            itm.name = data.todo.name;
            itm.is_completed = data.todo.is_completed;
          }
        });
      }
    }
  }, {
    key: "todoDeleted",
    value: function todoDeleted(data) {
      if (data.todoId) {
        app.items = app.items.filter(function (itm) {
          return itm.id !== data.todoId;
        });
      }
    }
  }]);

  return EventHandlers;
}();

/***/ })

}]);