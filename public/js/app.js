$(document).ready(function () {
    $('#file').change(function () {
        $('#submit_form').submit();
    });


});

function openPDF(hrefId, tabId) {
    var pdfUrl = document.getElementById(hrefId).src;
    localStorage.setItem('lastOpenedPDF', pdfUrl);
    localStorage.setItem('lastOpenedTab', tabId);
}

function setActiveTabOnLoad(tabId) {
    document.getElementById(tabId).click();
}
window.onload = function () {
    var lastOpenedTab = localStorage.getItem('lastOpenedTab');
    if (lastOpenedTab) {
        setActiveTabOnLoad(lastOpenedTab);
    }
};