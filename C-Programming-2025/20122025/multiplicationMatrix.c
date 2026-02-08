#include <stdio.h>

int main()
{
    int A[50][50], B[50][50], C[50][50], i, j, m1, n1, m2, n2;

    printf("\n\nMultiplication of two Matrices :\n");
    printf("------------------------------\n");
    // for A matrix
    printf("\n\n A Matrix :\n");
    printf("------------------------------\n");
    printf("Enter the number of rows of A matrix(between 1 to 50 ): ");
    scanf("%d", &m1);
    printf("Enter the number of columns of A matrix (between 1 to 50 ): ");
    scanf("%d", &n1);

    // for B matrix
    printf("\n\n B Matrix :\n");
    printf("------------------------------\n");
    printf("Enter the number of rows of B matrix(between 1 to 50 ): ");
    scanf("%d", &m2);
    printf("Enter the number of columns of B matrix (between 1 to 50 ): ");
    scanf("%d", &n2);

    if (n1 != m2)
    {
        printf("\n Error : Number of column of  the A matrix should be same as number of rows of B matrix. \n\n");
    }
    else
    {

        /* Stored values into the array*/
        printf("\n\n");

        printf("Enter elements of  A matrix :\n");
        printf("------------------------------\n");

        for (i = 0; i < m1; i++) //  row
        {
            for (j = 0; j < n1; j++) // column
            {
                printf("element - [%d],[%d] : ", i, j);
                scanf("%d", &A[i][j]);
            }
        }

        printf("\n\n");

        printf("Enter elements of  B matrix :\n");
        printf("------------------------------\n");

        for (i = 0; i < m2; i++)
        {
            for (j = 0; j < n2; j++)
            {
                printf("element - [%d],[%d] : ", i, j);
                scanf("%d", &B[i][j]);
            }
        }
        printf("\n A matrix is :\n");
        printf("------------------------------\n");

        for (i = 0; i < m1; i++)
        {
            printf("\n\t");
            for (j = 0; j < n1; j++)
                printf("%d\t", A[i][j]);
        }

        printf("\n\n");

        printf("\n B matrix is :\n");
        printf("------------------------------\n");

        for (i = 0; i < m2; i++)
        {
            printf("\n\t");
            for (j = 0; j < n2; j++)
                printf("%d\t", B[i][j]);
        }
        /* calculate the multiplication of the matrix */

        printf("\n\n");

        for (i = 0; i < m1; i++)
        {
            for (j = 0; j < n2; j++)
            {
                // Calculate the result
                for (int k = 0; k < n1; k++)
                {
                    C[i][j] += A[i][k] * B[k][j];
                }
            }
        }

        // output
        printf("\nThe C matrix is : \n");
        printf("------------------------------\n");

        for (i = 0; i < m1; i++)
        {
            printf("\n\t");
            for (j = 0; j < n2; j++)
                printf("%d\t", C[i][j]);
        }

        printf("\n\n");
    }
}


/*
Output:
Multiplication of two Matrices :
------------------------------


 A Matrix :
------------------------------
Enter the number of rows of A matrix(between 1 to 50 ): 2
Enter the number of columns of A matrix (between 1 to 50 ): 3


 B Matrix :
------------------------------
Enter the number of rows of B matrix(between 1 to 50 ): 3
Enter the number of columns of B matrix (between 1 to 50 ): 2


Enter elements of  A matrix :
------------------------------
element - [0],[0] : 1
element - [0],[1] : 3
element - [0],[2] : 4
element - [1],[0] : 2
element - [1],[1] : 1
element - [1],[2] : 6


Enter elements of  B matrix :
------------------------------
element - [0],[0] : 4
element - [0],[1] : 6
element - [1],[0] : 8
element - [1],[1] : 7
element - [2],[0] : 9
element - [2],[1] : 4

 A matrix is :
------------------------------

        1       3       4
        2       1       6


 B matrix is :
------------------------------

        4       6
        8       7
        9       4


The C matrix is : 
------------------------------

        64      43
        70      43
*/