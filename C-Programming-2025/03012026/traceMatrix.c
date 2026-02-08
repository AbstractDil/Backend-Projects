// Write a function that computes the trace of a square matrix.
#include <stdio.h>

int main(){
    int n, i, j;
    printf("Enter the number of rows/columns: ");
    scanf("%d", &n);

    int matrix[n][n];
    printf("Enter the elements of the matrix:\n");
    for(i = 0; i < n; i++){
        for(j = 0; j < n; j++){
            printf("Element [%d][%d]: ", i, j);
            scanf("%d", &matrix[i][j]);
        }
    }

    int trace = 0;
    for(i = 0; i < n; i++){
        trace += matrix[i][i];
    }

    printf("The trace of the matrix is: %d\n", trace);
    return 0;
}

/**
 * Example Input/Output:
 * Enter the number of rows/columns: 3
 * Enter the elements of the matrix:
 * Element [0][0]: 1    
 * Element [0][1]: 2
 * Element [0][2]: 3
 * Element [1][0]: 4
 * Element [1][1]: 5
 * Element [1][2]: 6
 * Element [2][0]: 7
 * Element [2][1]: 8
 * Element [2][2]: 9
 * The trace of the matrix is: 15
 */
