#include <stdio.h>
/*
* Program to sum two numbers entered by the user
* process: 2
*/

int main(){
    // Declare variables
    int num1, num2, sum;
    // Prompt user for input
    printf("Enter two numbers separated by space: ");
    // Read user input
    scanf("%d %d", &num1, &num2);
    // Calculate sum
    sum = num1 + num2;
    // Display result
    printf("The sum of %d and %d is %d\n", num1, num2, sum);
    return 0;
}

/*
*********************************************
* Sample Output:
* Enter two numbers separated by space: 5 10
* The sum of 5 and 10 is 15
*********************************************
*/