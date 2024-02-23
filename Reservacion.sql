USE [Parqueo_ULACIT]
GO

/****** Object:  Table [dbo].[Reservacion]    Script Date: 12/5/2022 5:36:51 PM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Reservacion](
	[ID_Reservacion] [int] NOT NULL,
	[ID_Persona] [bigint] NOT NULL,
	[Placa] [int] NOT NULL,
	[Espacio] [int] NOT NULL,
	[hora_ingreso] [datetime] NOT NULL,
 CONSTRAINT [PK_4] PRIMARY KEY CLUSTERED 
(
	[ID_Reservacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[Reservacion]  WITH CHECK ADD  CONSTRAINT [FK_1] FOREIGN KEY([ID_Persona])
REFERENCES [dbo].[Persona] ([ID_Persona])
GO

ALTER TABLE [dbo].[Reservacion] CHECK CONSTRAINT [FK_1]
GO

ALTER TABLE [dbo].[Reservacion]  WITH CHECK ADD  CONSTRAINT [FK_2] FOREIGN KEY([Espacio])
REFERENCES [dbo].[Parqueo] ([Espacio])
GO

ALTER TABLE [dbo].[Reservacion] CHECK CONSTRAINT [FK_2]
GO

ALTER TABLE [dbo].[Reservacion]  WITH CHECK ADD  CONSTRAINT [FK_3] FOREIGN KEY([Placa])
REFERENCES [dbo].[Vehiculo] ([Placa])
GO

ALTER TABLE [dbo].[Reservacion] CHECK CONSTRAINT [FK_3]
GO

