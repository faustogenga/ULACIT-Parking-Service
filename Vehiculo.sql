USE [Parqueo_ULACIT]
GO

/****** Object:  Table [dbo].[Vehiculo]    Script Date: 12/5/2022 5:36:58 PM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[Vehiculo](
	[Placa] [int] NOT NULL,
	[Marca] [varchar](50) NOT NULL,
	[ID_Persona] [bigint] NOT NULL,
	[Color] [varchar](20) NOT NULL,
	[Modelo] [varchar](50) NOT NULL,
 CONSTRAINT [PK_3] PRIMARY KEY CLUSTERED 
(
	[Placa] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[Vehiculo]  WITH CHECK ADD  CONSTRAINT [FK_4] FOREIGN KEY([ID_Persona])
REFERENCES [dbo].[Persona] ([ID_Persona])
GO

ALTER TABLE [dbo].[Vehiculo] CHECK CONSTRAINT [FK_4]
GO

