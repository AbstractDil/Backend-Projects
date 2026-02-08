#include <stdio.h>

// Function to add two matrices of same dimensions

int main(){

    // Declaring two 2x3 matrices and a result matrix
    int a[2][3], b[2][3], sum[2][3], i,j;

    // Taking input for first matrix
    printf("Enter elements of first matrix:\n");
    for(i=0; i<2; i++){
        for(j=0; j<3; j++){
            printf("Element [%d][%d]: ", i, j);
            scanf("%d", &a[i][j]);
        }
    }

    // Taking input for second matrix
    printf("Enter elements of second matrix:\n");
    for(i=0; i<2; i++){
        for(j=0; j<3; j++){
            printf("Element [%d][%d]: ", i, j);
            scanf("%d", &b[i][j]);
        }
    }

    // Displaying the first matrix
    printf("First matrix:\n");
    for(i=0; i<2; i++){
        for(j=0; j<3; j++){
            printf("%d ", a[i][j]);
        }
        printf("\n");
    }

    // Displaying the second matrix
    printf("Second matrix:\n");
    for(i=0; i<2; i++){
        for(j=0; j<3; j++){
            printf("%d ", b[i][j]);
        }
        printf("\n");
    }

    // Adding the two matrices
    for(i=0; i<2; i++){
        for(j=0; j<3; j++){
            sum[i][j] = a[i][j] + b[i][j];
        }
    }

    // Displaying the sum
    printf("Sum of the two matrices:\n");
    for(i=0; i<2; i++){
        for(j=0; j<3; j++){
            printf("%d ", sum[i][j]);
        }
        printf("\n");
    }

    return 0;
}


/**
 * ***********************************
 * Example Input/Output:
 * ***********************************
Enter elements of first matrix:
Element [0][0]: 2
Element [0][1]: 1
Element [0][2]: 3
Element [1][0]: 4
Element [1][1]: 5
Element [1][2]: 6
Enter elements of second matrix:
Element [0][0]: 6 
Element [0][1]: 1
Element [0][2]: 9
Element [1][0]: 5
Element [1][1]: 4
Element [1][2]: 5
First matrix:
2 1 3 
4 5 6 
Second matrix:
6 1 9 
5 4 5 
Sum of the two matrices:
8 2 12 
9 9 11 
***************************************/