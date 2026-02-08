#include <stdio.h>

// Create a function
void calculateSum(int a, int b) {
  int sum = a + b;
  printf("The sum of %d + %d is: %d\n", a, b, sum);
}

int main() {

    int x, y;
    printf("Enter first number: ");
    scanf("%d", &x);
    printf("Enter second number: ");
    scanf("%d", &y);
    calculateSum(x, y);  // call the function

  //calculateSum(5, 10);  // call the function
  return 0;
}