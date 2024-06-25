var scriptHelperFunctions = document.getElementById("script-helper-functions");
var { locale, tz } = b64JsonDecode( scriptHelperFunctions.getAttribute("encdata") );

function b64JsonDecode(encdata, def){ try { return JSON.parse( decodeURIComponent(escape(atob( encdata ))) ); } catch (e) { console.warn("Cant decode b64") } return def == undefined ? {} : def; }
function redirect(url, target="_self") { window.open(url, target); }
function raiseEvent(element, eventName, detail){ if (element && "dispatchEvent" in element) element.dispatchEvent(new CustomEvent(eventName, { detail })) }
String.prototype.toLocaleDateString = function () { return new Date(new Date(this).toISOString().slice(0, 10)+" EDT").toLocaleString(locale, { dateStyle: "short", timeStyle: undefined, timeZone: tz }); }