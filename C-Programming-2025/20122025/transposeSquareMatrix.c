#include <stdio.h>

int main(){
    int rows, cols;
    // Get dimensions from the user
    printf("Enter the number of rows/cols: ");
    scanf("%d", &rows);
    cols = rows;

    // Declare matrix
    int matrix[rows][cols];
    int transposedMatrix[cols][rows];

    // Get matrix elements from the user
    printf("Enter the elements of the matrix:\n");
    for (int i = 0; i < rows; i++) {
        for (int j = 0; j < cols; j++) {
            printf("Element [%d][%d]: ", i, j);
            scanf("%d", &matrix[i][j]);
        }
    }
    // print original matrix
    printf("Original matrix:\n");
    for (int i = 0; i < rows; i++) {
        for (int j = 0; j < cols; j++) {
            printf("%d ", matrix[i][j]);
        }
        printf("\n");
    }

    // Transpose of square matrix
    for (int i = 0; i < rows; i++) {
        for (int j = i; j < cols; j++) {
            int temp = matrix[i][j];
            matrix[i][j] = matrix[j][i];
            matrix[j][i] = temp;
        }
    }

    // Display the transposed matrix
    printf("Transposed matrix:\n");
    for (int i = 0; i < rows; i++) {
        for (int j = 0; j < cols; j++) {
            printf("%d ", matrix[i][j]);
        }
        printf("\n");
    }

    return 0;
}