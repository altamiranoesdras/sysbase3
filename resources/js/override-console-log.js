/*
Author: Shammi Hans | Smi0001
Dependency: JavaScript (ES06)
Description: Overriding console.log to customize the log with current time along with passed log arguments
*/

const origlog = console.log;

const defaultOptions = Object.freeze(
    {
        logDate: false,
        logDateFormat: 'toLocaleString', // Date format is actually the format-function-name in which user wants to convert the date
        enableAll: true,
        enableLog: true,
        enableLogI: true,
        enableLogD: true,
        enableLogE: true,
        logCustomPrefix: '', // accepts any string of length < 1000
        logDateThenPrefix: true,
        debugPrefix: 'DEBUG:',
        infoPrefix: 'INFO:',
        errorPrefix: 'ERROR:',
        warmPrefix: 'WARNING:',
        stopLogging: false // stop this logging with format, only console.log() & log() can be used as usual logging
    }
);
let logConfig  = {};
console.resetLogger = function() {
    logConfig = JSON.parse(JSON.stringify(defaultOptions));
};
console.resetLogger();

const getCurrentDateFormat = function() {
    var dateStr = new Date().toLocaleString(); // default date format
    if (logConfig && logConfig.logDateFormat && typeof logConfig.logDateFormat === 'string') {
        switch (logConfig.logDateFormat.toLowerCase()) {
            case 'todatestring':
                dateStr = (new Date()).toDateString();
                break;
            case 'togmtstring':
                dateStr = (new Date()).toGMTString();
                break;
            case 'toisostring':
                dateStr = (new Date()).toISOString();
                break;
            case 'tojson':
                dateStr = (new Date()).toJSON();
                break;
            case 'tolocaledatestring':
                dateStr = (new Date()).toLocaleDateString();
                break;
            case 'todatestring':
                dateStr = (new Date()).toLocaleTimeString();
                break;
            case 'tostring':
                dateStr = (new Date()).toString();
                break;
            case 'totimestring':
                dateStr = (new Date()).toTimeString();
                break;
            case 'toutcstring':
                dateStr = (new Date()).toUTCString();
                break;
            default:
                // dateStr = (new Date()).toLocaleString();
                break;
        }
    }
    return dateStr + ' ';
};


console.log = function (obj, ...argumentArray) {
    var dateString = '';
    var datePrefix = '';
    if (logConfig && !logConfig.stopLogging) {
        if (logConfig && logConfig.enableAll && logConfig.enableLog && logConfig.logDate) {
            dateString = getCurrentDateFormat();
            var prefix = '';
            if (typeof logConfig.logCustomPrefix === 'string' && logConfig.logCustomPrefix.length < 1000 ) {
                prefix = logConfig.logCustomPrefix;
            }
            datePrefix = logConfig.logDateThenPrefix ? (dateString + prefix + ' ') : (prefix + ' ' + dateString);
        }
    }
    if (typeof obj === 'string') {
        argumentArray.unshift(datePrefix + obj);
    } else {
        // This handles console.log( object )
        argumentArray.unshift(obj);
        argumentArray.unshift(datePrefix);
    }
    origlog.apply(this, argumentArray);
};

const getDatePrefix = function(prefix) {
    var datePrefix = '';
    var dateString = '';
    if (logConfig && logConfig.enableAll) {
        if (logConfig.logDate) {
            dateString = getCurrentDateFormat();
        }
        datePrefix = logConfig.logDateThenPrefix ? (dateString + prefix + ' ') : (prefix + ' ' + dateString);
    }
    return datePrefix + ' ';
};

console.logD = function (obj, ...argumentArray) {

    if (logConfig && !logConfig.stopLogging) {
        var datePrefix = (logConfig && logConfig.enableLogD) ?
            getDatePrefix(logConfig.debugPrefix) :
            '';
        if (typeof obj === 'string') {
            argumentArray.unshift(datePrefix + obj);
        } else {
            argumentArray.unshift(obj);
            argumentArray.unshift(datePrefix);
        }
        origlog.apply(this, argumentArray);
    }
};

console.logW = function (obj, ...argumentArray) {

    var origlog = console.warn;

    if (logConfig && !logConfig.stopLogging) {
        var datePrefix = (logConfig && logConfig.enableLogD) ?
            getDatePrefix(logConfig.warmPrefix) :
            '';
        if (typeof obj === 'string') {
            argumentArray.unshift(datePrefix + obj);
        } else {
            argumentArray.unshift(obj);
            argumentArray.unshift(datePrefix);
        }
        origlog.apply(this, argumentArray);
    }
};

console.logI = function (obj, ...argumentArray) {

    var origlog = console.info;

    if (logConfig && !logConfig.stopLogging) {
        var datePrefix = (logConfig && logConfig.enableLogI) ?
            getDatePrefix(logConfig.infoPrefix) :
            '';
        if (typeof obj === 'string') {
            argumentArray.unshift(datePrefix + obj);
        } else {
            argumentArray.unshift(obj);
            argumentArray.unshift(datePrefix);
        }
        origlog.apply(this, argumentArray);
    }
};

console.logE = function (obj, ...argumentArray) {

    var origlog = console.error;

    if (logConfig && !logConfig.stopLogging) {
        var datePrefix = (logConfig && logConfig.enableLogE) ?
            getDatePrefix(logConfig.errorPrefix) :
            '';
        if (typeof obj === 'string') {
            argumentArray.unshift(datePrefix + obj);
        } else {
            // This handles console.log( object )
            argumentArray.unshift(obj);
            argumentArray.unshift(datePrefix);
        }
        origlog.apply(this, argumentArray);
    }
};

module.exports.log = console.log;
module.exports.logI = console.logI;
module.exports.logD = console.logD;
module.exports.logW = console.logW;
module.exports.logE = console.logE;
module.exports.logConfig = logConfig;
module.exports.resetLogger = console.resetLogger;

