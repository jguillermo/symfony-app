const requestLib = require('request');

const base_path = 'http://php:80';

function request(url = '', method = 'GET', params = []) {
    return new Promise((resolve, reject) => {
        let options = getOptions(url, method, params);
        requestLib(options, (err, res, body) => {
            if (!err && (res.statusCode == 200 || res.statusCode == 201)) {
                resolve({ body, statusCode: res.statusCode });
            } else {
                //console.log('***', err, '***',res.statusCode,'***',body);
                reject(err, res, body);
            }
        });
    });
}

function getOptions(url, method, params) {
    url = `${base_path}/${url}`;
    return {
        url,
        method,
        headers: {
            'user-agent': 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36',
            'Host': 'localhost'
        }
    };
}

module.exports = request;