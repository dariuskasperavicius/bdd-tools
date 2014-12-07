casper.test.begin("Display todo list", function (test) {
    casper.start("http://localhost:3000", function () {
        while (this.exists("li button.delete")) {
            this.click("li button.delete");
        }
    });

    casper.then(function viewTaskList() {
        test.assertVisible("form.new-task", "I should see task addition form");
        test.assertDoesntExist("ul.task-list>*", "I should see empty task list");
    });

    casper.then(function addATask() {
        this.sendKeys("form.new-task input", "I have to do something");
        this.click("#add-button");
        test.assertTextExists("I have to do something", "I should see task added to the list");
    });

    casper.run(function go() {
        test.done();
    })
});
