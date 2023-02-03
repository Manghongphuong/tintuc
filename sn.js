const WIDTH = 20;
const HEIGHT = 20;

const snake = {
  x: Math.floor(WIDTH / 2),
  y: Math.floor(HEIGHT / 2)
};

const updateSnake = () => {
  // move the snake in a random direction
  const direction = Math.floor(Math.random() * 4);
  switch (direction) {
    case 0:
      snake.x++;
      break;
    case 1:
      snake.x--;
      break;
    case 2:
      snake.y++;
      break;
    case 3:
      snake.y--;
      break;
  }
};

setInterval(() => {
  updateSnake();
  console.log(`Snake is at: ${snake.x}, ${snake.y}`);
}, 500);