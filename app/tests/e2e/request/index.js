require('./config');
const rp = require('request-promise-native');


const apiHost = process.env.HOST;


async function request(url = '', method = 'GET', params = {}) {
    try {
        let res = await rp(getOptions(url, method, params));
        return parseResponse(res);
    }
    catch (error) {
        return parseResponse(error.response);
        //throw new ExceptionRequest(parseResponse(error.response));
    }
}

function parseResponse(res) {
    return { body: res.body, statusCode: res.statusCode };
}

function getOptions(url, method, params) {
    url = `${apiHost}/${url}`;
    return {
        url,
        method,
        headers: {
            'user-agent': 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36',
            'Host': 'localhost'
        },
        json: true,
        body: params,
        resolveWithFullResponse: true
    };
}


function ExceptionRequest(data) {
    this.body = data.body;
    this.statusCode = data.statusCode;
    this.name = 'ExceptionRequest';
    this.message = JSON.stringify(data);
    this.stack = (new Error()).stack;
}
ExceptionRequest.prototype = Object.create(Error.prototype);
ExceptionRequest.prototype.constructor = ExceptionRequest;


module.exports = request;