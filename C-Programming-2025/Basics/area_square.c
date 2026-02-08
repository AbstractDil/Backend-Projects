#include <stdio.h>

/*
*********************************************************
* Write a C program to calculate the area of a square 
* given the length of its side entered by the user
**********************************************************
*/

int main(){
    // using int variable
    int side, area;
    // Prompt user for input
    printf("Enter the length of the side of the square: ");
    // Read user input
    scanf("%d", &side);
    // Calculate area
    area = side * side;
    // Display result
    printf("The area of the square with side %d is %d\n", side, area);
    return 0;
}

/*
*********************************************************
* Sample Output:
* Enter the length of the side of the square: 5
* The area of the square with side 5 is 25
**********************************************************
*/