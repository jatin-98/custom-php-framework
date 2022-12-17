<?php $this->title = 'Contact'; ?>

<h1>CONTACT FORM</h1>

<form method="POST">
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label>Example select</label>
        <select class="form-control">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>  
            <option>5</option>
        </select>
    </div>
    <div class="form-group">
        <label>Subject</label>
        <textarea class="form-control" rows="3" name="subject"></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submot">Submit</button>
    </div>
</form>