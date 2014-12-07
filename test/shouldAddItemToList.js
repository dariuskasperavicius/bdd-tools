module.exports = {
    'inputs task name': function (browser) {
        browser
            .init()
            .setValue('input[type=text]', 'nightwatch')
    },

    'clicks to add task': function (browser) {
        browser
            .click('#add-button');
    },

    'has item in the list': function (browser) {
        browser
            .assert.elementPresent('ul.task-list li')
            .assert.containsText('ul.task-list li .text', 'nightwatch')
            .end();
    }
};
