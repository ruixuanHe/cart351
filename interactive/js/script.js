/*****************

Title of Project
Author Name

This is a template. You must fill in the title,
author, and this description to match your project!

******************/

// setup()
//
// Description of setup


function preload() {
  chinese = loadFont('assets/zqlqxsj.ttf');
}

function setup() {
  createCanvas(windowWidth, windowHeight,WEBGL);
  pg = createGraphics(windowWidth, windowHeight);
  pg1 = createGraphics(windowWidth, windowHeight);
  pg2 = createGraphics(windowWidth, windowHeight);
  pg3 = createGraphics(windowWidth, windowHeight);
}


// draw()
//
// Description of draw()

function draw() {
  background(255, 102, 102);
  rotateY((mouseX-windowWidth/2)*0.005);
  rotateX((mouseY-windowHeight/2)*0.005);
  pg.textFont(chinese);
  pg.background(255, 128, 128);
  pg.textSize(400);
  pg.textAlign(CENTER, CENTER);
  var textC = verticalText('福');
  pg.text(textC, width * 0.5, height * 0.65);

  pg1.textFont(chinese);
  pg1.background(255, 255, 255,0);
  pg1.textSize(64);
  pg1.textAlign(CENTER, CENTER);
  var textLeft = verticalText('春临大地百花艳');
  var textR = verticalText('节至人间万象新');

  pg1.text(textLeft, width * 0.35, height * 0.5);
  pg1.text(textR, width * 0.65, height * 0.5);

  pg2.textFont(chinese);
  pg2.background(255, 204, 0,0);
  pg2.textSize(64);
  pg2.textAlign(CENTER, CENTER);
  var textLeft = verticalText('事事如意大吉祥');
  var textR = verticalText('家家顺心永安康');
  var textT = '四  季  兴  隆';
  pg2.text(textT, width * 0.5, height * 0.08);
  pg2.text(textLeft, width * 0.25, height * 0.5);
  pg2.text(textR, width * 0.75, height * 0.5);

  pg3.textFont(chinese);
  pg3.background(255, 204, 0,0);
  pg3.textSize(64);
  pg3.textAlign(CENTER, CENTER);
  var textLeft = verticalText('旧岁又添几个喜');
  var textR = verticalText('新年更上一层楼');

  pg3.text(textLeft, width * 0.15, height * 0.5);
  pg3.text(textR, width * 0.85, height * 0.5);

  push();
  translate(0,0,-100);
  rotate(PI)
  texture(pg);
  plane(200, 200);
  pop();

  push();
  translate(0,100,-100);
  texture(pg1);
  plane(windowWidth, windowHeight);
  pop();


  push();
  translate(0,100,0);
  texture(pg2);
  plane(windowWidth, windowHeight);
  pop();

  push();
  translate(0,100,100);
  texture(pg3);
  plane(windowWidth, windowHeight);
  pop();

}

function verticalText(input) {
  var output = "";
  for (var i = 0; i < input.length; i += 1) {
    output += input.charAt(i) + "\n";
  }
  return output;
}

function windowResized() {
   resizeCanvas(windowWidth, windowHeight);
}
