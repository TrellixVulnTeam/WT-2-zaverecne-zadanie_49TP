/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/sketchpad.js ***!
  \***********************************/
var el = document.getElementById('sketchpad');
var pad = new Sketchpad(el); // setLineColor

function setLineColor(e) {
  var color = e.target.value;

  if (!color.startsWith('#')) {
    color = '#' + color;
  }

  pad.setLineColor(color);
}

document.getElementById('line-color-input').oninput = setLineColor; // setLineSize

function setLineSize(e) {
  var size = e.target.value;
  pad.setLineSize(size);
}

document.getElementById('line-size-input').oninput = setLineSize; // undo

function undo() {
  pad.undo();
}

document.getElementById('undo').onclick = undo; // redo

function redo() {
  pad.redo();
}

document.getElementById('redo').onclick = redo; // clear

function clear() {
  pad.clear();
}

document.getElementById('clear').onclick = clear;

function uploadJson() {
  document.getElementById('uploadJsonInput').click();
}

document.getElementById('uploadJson').addEventListener('click', uploadJson, false);

function changeJson(e, a) {
  var files = e.target.files;
  if (files.length == 0) return;
  var reader = new FileReader();
  reader.addEventListener('load', function (event) {
    try {
      var data = JSON.parse(event.target.result);
    } catch (e) {
      alert("Unable to read JSON file");
      throw e;
    }

    pad.loadJSON(data);
  });
  reader.readAsText(files[0]);
}

document.getElementById('uploadJsonInput').addEventListener('change', changeJson, false);

function downloadJson() {
  var data = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(pad.toJSON()));
  this.href = data;
}

document.getElementById('downloadJson').addEventListener('click', downloadJson, false);

function downloadPng() {
  var data = pad.canvas.toDataURL("image/png");
  this.href = data;
}

document.getElementById('downloadPng').addEventListener('click', downloadPng, false); // resize

window.onresize = function (e) {
  pad.resize(el.offsetWidth);
};

    let ele = document.getElementsByClassName('task');

    for (let task of ele) {
        // console.log(task);
        let t = {
            id: task.getAttribute('data-id'),
            taskType: task.getAttribute('data-type'),
        }
        if (t.taskType==="draw"){
            document.getElementById('file' + t.id).addEventListener("change", function (e){
                console.log('upload' + t.id)
                console.log(e);
                input = document.getElementById('file' + t.id);
                id = 'upload' + t.id
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#' + id)
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            })
        }

    }



/******/ })()
;
