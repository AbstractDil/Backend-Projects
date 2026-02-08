#include <stdio.h>

int main() {
    int rows, cols;

    // Get dimensions from the user
    printf("Enter the number of rows: ");
    scanf("%d", &rows);
    printf("Enter the number of columns: ");
    scanf("%d", &cols);

    // Declare matrices
    int matrixA[rows][cols];
    int matrixB[rows][cols];
    int resultMatrix[rows][cols];

    // Input elements for matrix A
    printf("\nEnter elements for Matrix A:\n");
    for (int i = 0; i < rows; i++) {
        for (int j = 0; j < cols; j++) {
            printf("Enter element A[%d][%d]: ", i, j);
            scanf("%d", &matrixA[i][j]);
        }
    }

    // Input elements for matrix B
    printf("\nEnter elements for Matrix B:\n");
    for (int i = 0; i < rows; i++) {
        for (int j = 0; j < cols; j++) {
            printf("Enter element B[%d][%d]: ", i, j);
            scanf("%d", &matrixB[i][j]);
        }
    }

    // display matrix A
    printf("\nMatrix A:\n");
    for (int i = 0; i < rows; i++) {
        for (int j = 0; j < cols; j++) {
            printf("%d\t", matrixA[i][j]);
        }
        printf("\n");
    }

    // display matrix B
    printf("\nMatrix B:\n");
    for (int i = 0; i < rows; i++) {
        for (int j = 0; j < cols; j++) {
            printf("%d\t", matrixB[i][j]);
        }
        printf("\n");
    }

    // Perform matrix subtraction (A - B)
    for (int i = 0; i < rows; i++) {
        for (int j = 0; j < cols; j++) {
            resultMatrix[i][j] = matrixA[i][j] - matrixB[i][j];
        }
    }

    // Print the result matrix
    printf("\nResult of Matrix A - Matrix B:\n");
    for (int i = 0; i < rows; i++) {
        for (int j = 0; j < cols; j++) {
            printf("%d\t", resultMatrix[i][j]);
        }
        printf("\n");
    }

    return 0;
}

/**
 * Example Input/Output:
 * Enter the number of rows: 2
Enter the number of columns: 2

Enter elements for Matrix A:
Enter element A[0][0]: 1
Enter element A[0][1]: 4
Enter element A[1][0]: 5
Enter element A[1][1]: 6

Enter elements for Matrix B:
Enter element B[0][0]: 2
Enter element B[0][1]: 3
Enter element B[1][0]: 1
Enter element B[1][1]: 6

Matrix A:
1       4
5       6

Matrix B:
2       3
1       6

Result of Matrix A - Matrix B:
-1      1
4       0
 */